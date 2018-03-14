<?php
error_reporting(-1);

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__); // папка public
define('CORE', dirname(__DIR__) . '/venodor/core'); // папка vendor
define('ROOT', dirname(__DIR__)); // папка a
define('APP', dirname(__DIR__) . '/app'); // папка app
define('LAYOUT', 'default');

require '../vendor/libs/functions.php';

/* 
 * Функция автозагрузки 
 */
spl_autoload_register(function($class){
   $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once($file);
    }
});

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)?$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)?$', ['controller' => 'Page', 'action' => 'view']);

// default routs
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


Router::dispatch($query);