<?php

namespace Framework;

class Request
{
    private $type;
    private $path;
    private $post_params;
    private $get_params;

    public function __construct()
    {
        $this->path = $_GET['path'];
        $this->get_params = $_GET;
        unset($this->get_params['path']);
        $this->post_params = $_POST;
        if($_SERVER['REQUEST_METHOD'] === 'POST') $this->type = Route::METHOD_POST;
        if($_SERVER['REQUEST_METHOD'] === 'GET') $this->type = Route::METHOD_GET;
    }

    public function getGetParams(): array
    {
        return $this->get_params;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getPath()
    {
        return $this->path;
    }
}