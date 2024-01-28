<?php

namespace Framework\Exceptions;

class EnvLoadException extends \Exception
{
    public function __construct()
    {
        $this->message = "ENV file not found";
        parent::__construct();
    }
}