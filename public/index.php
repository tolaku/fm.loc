<?php

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__); // папка public
define('CORE', dirname(__DIR__) . '/venodor/core'); // папка vendor
define('ROOT', dirname(__DIR__)); // папка a
define('APP', dirname(__DIR__) . '/app'); // папка app

//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

/* 
 * Функция автозагрузки 
 */
spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    $file = APP . "/controllers/$class.php";
    if(is_file($file)){
        require_once($file);
    }
});

Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Main']);

// default routs
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);