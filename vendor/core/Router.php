<?php 

namespace vendor\core;

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
                foreach ($matches as $k => $v){
                    // если это строка, а не число
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                // если action пустой, положим туда index
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    
    /* 
     * Перенаправляет URL по корректному маршруту 
     * $param string $url входящий URL
     * @return void
    */
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        var_dump($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['controller'];

            if(class_exists($controller)){ // проверяем исли такой Class
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                }else{
                    echo "Метод <b>$controller::$action</b> не найдет";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найдет";
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }
    
    protected static function upperCamelCase($name){
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }
    
    protected static function removeQueryString($url){
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
            
        }

    }
}