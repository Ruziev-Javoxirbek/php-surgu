<?php

namespace Framework;

class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run(): void
    {
        echo print_r($this->router->getContent(), true);
    }
}