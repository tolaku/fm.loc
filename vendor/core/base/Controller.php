<?php

namespace vendor\core\base;

/**
 * Description of Controller
 *
 * @author Анатолий
 */
abstract class Controller {
    /**
     * текущий маршрут и параметры (controller, action, params)
     * @var array
     */
    public $route = [];
    
    /**
     * вид
     * @var string
     */
    public $view;
    
    /**
     * текущий шаблон
     * @var string
     */
    public $layout;


    public function __construct($route) {
        $this->route = $route;
        $this->view = $route['action'];
    }
    
    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render();
    }
}
