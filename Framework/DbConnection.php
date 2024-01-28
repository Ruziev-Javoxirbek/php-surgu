<?php

namespace Framework;

use PDO;
use PDOException;

class DbConnection
{
    private static $connection;

    public static function getConnection(): PDO
    {
        if (!self::$connection)
            self::$connection = new PDO("$_ENV[dbconnection]:host=$_ENV[dbhost];dbname=$_ENV[dbname]", $_ENV['dbuser'], $_ENV['dbpassword']);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return (self::$connection);

    }
}