<?php

namespace Framework;

class Request
{

    private $type;

    private $path = '';

    private $post_params;

    private $get_params;

    private $user;

    private $session;

    private $message;
    
    public function __construct()
    {
        if (array_key_exists('path', $_GET)){
            $this->path = $_GET['path'];
            unset($this->get_params['path']);
        }
        $this->post_params = $_POST;
        if($_SERVER['REQUEST_METHOD'] === 'POST') $this->type = Route::METHOD_POST;
        if($_SERVER['REQUEST_METHOD'] === 'GET') $this->type = Route::METHOD_GET;
        $this->session = $_SESSION;
    }

    public function getGetParams(): array
    {
        return $this->get_params;
    }

    public function getPostParams(): array
    {
        return $this->post_params;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function getSession()
    {
        return $this->session;
    }
}