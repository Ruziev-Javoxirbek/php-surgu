<?php

namespace Framework;

class Route
{
    const METHOD_GET = 1;
    const METHOD_POST = 2;
    private $path;
    private $action;
    private $type;

    public function __construct($path, $action, $type)
    {
        $this->path = $path;
        $this->action = $action;
        $this->type = $type;

    }

    public function getMask(){
        $path = $this->path;
        $path =  preg_replace("/{[a-z]\w*}/","(\w*)",$path);
        return '~'.$path.'~';
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getControllerClass(): string
    {
        return "App\Controllers\\".explode('@', $this->action)[0];
    }

    public function getControllerMethodName(): string
    {
        return explode('@', $this->action)[1];
    }

    public function getType()
    {
        return $this->type;
    }
}
