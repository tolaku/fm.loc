<?php

namespace app\controllers;
/**
 * Description of Main
 *
 * @author Анатолий
 */
class Main extends App {
    
    //public $layout = 'main';

    public function indexAction(){
        //$this->layout = false;
       $this->layout = 'main';
 //      $this->view = 'test';
    }
}
