<?php

namespace app\controllers;
/**
 * Description of Posts
 *
 * @author Анатолий
 */
class Posts extends App {

    public function indexAction(){
        echo 'Posts::index';
    }
    
    public function testAction(){
        debug($this->route);
        echo 'Posts::test';
    }
}
