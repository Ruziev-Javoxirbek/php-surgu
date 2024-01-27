<?php

use Dotenv\Dotenv;
use Framework\Container;
use Framework\DbConnection;

if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
echo $_GET['path'];
    if (file_exists(".env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load(); 
        echo "<br>Окружение загружено<p>";
    }
    else {
        echo "Ошибка загрузки ENV<br>";
    }

    Container::getApp()->run();


    die();