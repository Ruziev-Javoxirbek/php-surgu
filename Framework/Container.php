<?php

namespace Framework;

class Container
{

    public static function getApp(): Application
    {
        return new Application(self::getRouter());
    }

    public static function getAuth(): Auth
    {
        return new Auth(self::getRequest());
    }

    public static function getMessage(): Message
    {
        return new Message(self::getRequest());
    }

    public static function getRouter(): Router
    {
        return new Router(self::getRequest(), self::getAuth(), self::getMessage());
    }

    public static function getRequest(): Request
    {
        return new Request();
    }


}
