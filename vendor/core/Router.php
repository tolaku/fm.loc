<?php 

class Router {
    // создаем свойство
    protected static $routes = [];
    protected static $route = [];

    // метод
    public static function add($regexp, $route = []){
            self::$routes[$regexp] = $route;
    }

    // метод всех маршрутов
    public static function getRoutes(){
            return self::$routes;
    }

    // метод текущего маршрута
    public static function getRoute(){
            return self::$route;
    }

    // добавляет маршрут в таблицу маршрутов
    // 
    public static function matchRoute($url){
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#$pattern#i", $url, $matches)){ // сравниваем и сохраняем в $matches
                debug($matches);
                    self::$route = $route;
                    return true;
            }
        }
        return false;
    }
    
    public static function dispatch($url){
        if(self::matchRoute($url)){
            
        } else {
            http_response_code(404);
            include '404.html';
        }
    }
}