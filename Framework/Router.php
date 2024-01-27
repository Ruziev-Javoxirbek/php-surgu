<?php

namespace Framework;

class Router
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    public function getContent()
    {
        return $this->request->getGetParams();

    }
}