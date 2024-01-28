<?php

namespace Framework;

use Framework\Exceptions\MethodNotFoundException;
use Framework\Exceptions\RouteNotFoundException;
use Framework\Exceptions\UnauthorizedException;
use ReflectionMethod;

class Router
{
    private Request $request;

    public Auth $auth;

    public Message $message;
    
    public static array $routes = []; 

    public function __construct(Request $request, Auth $auth, Message $message)
    {
        $this->request = $request;
        $this->auth = $auth;
        $this->message = $message;
    }

    private function getCurrentRoute()
    {
        $routes = array_filter(self::$routes,
            fn($route) => $route->getType() == $this->request->getType() && preg_match($route->getMask(), $this->request->getPath()));
        if (!$routes) {
            return null;
        }
        usort($routes, fn($route_first, $route_second) => count($this->getParamsForController($route_second)) - count($this->getParamsForController($route_first)));
        return $routes[0];
    }

    /**
     * @throws UnauthorizedException
     */
    private function checkAuth(Route $route)
    {
        $this->request = $this->auth->enrichByUser($this->request);

        if ($route->isRequireAuth() && !$this->request->getUser()) {
            throw new UnauthorizedException();
        }

    }

    private function checkMessage()
    {
        $this->request = $this->message->enrichByMessage($this->request);
        $_SESSION['msg'] = null;
    }

    private function getParamsForController(Route $route)
    {
        $params = [];
        preg_match_all($route->getMask(), $this->request->getPath(), $params);
        return array_map(fn($p) => $p[0], array_slice($params, 1));

    }

    /**
     * @throws RouteNotFoundException
     * @throws MethodNotFoundException
     * @throws UnauthorizedException
     */
    public function getContent()
    {
        $exec_route = $this->getCurrentRoute();

        if (!$exec_route) {
            throw new RouteNotFoundException();
        };

        $this->checkAuth($exec_route);
        $this->checkMessage();
        $controller_name = $exec_route->getControllerClass();
        $method_name = $exec_route->getControllerMethodName();
        $controller = new $controller_name();

        if (!method_exists($controller, $method_name)) {
            throw new MethodNotFoundException($method_name, $controller_name);
        }
        $params_to_controller = $this->getParamsForController($exec_route);
        $reflection = new ReflectionMethod($controller, $method_name);
        $parameters = $reflection->getParameters();

        $args = [];
        foreach ($parameters as $param) {
            if ($param->getName() === 'request') {
                $args['request'] = $this->request;
            }
        }

        $args = array_merge($params_to_controller, $args);
        return call_user_func_array([$controller, $method_name], $args);
    }

    public static function addRoute($route)
    {
        array_push(self::$routes, $route);
    }
}