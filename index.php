<?php
//    echo "<b>url</b></b> - http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//    echo "<br><b>parameter : value</b><br>";
//    foreach($_GET as $key => $value){
//       echo $key . " : " . $value . "<br>";
//    }
    use Framework\Container;

    if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
        require_once dirname(__FILE__) . '/vendor/autoload.php';
    }

    Container::getApp()->run();

    die();