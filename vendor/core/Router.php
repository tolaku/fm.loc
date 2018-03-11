<?php 

class Router {
	// создаем свойство
	protected static $routes = [];
	protected static $route = [];

	// метод
	public static function add($regexp, $route = []){
		self::$routes[$regexp] = $route;
	}

	// метод для распечатки таблицы все маршрутов
	public static function getRoutes(){
		return self::$routes;
	}

	// метод для распечатки таблицы текущего маршрута
	public static function getRoute(){
		return self::$route;
	}

	public static function matchRoute($url){
		foreach(self::$routes as $pattern => $route){
			if($url == $pattern){ // если url равен
				self::$route = $route;
				return true;
			}
		}
		return false;
	}

}