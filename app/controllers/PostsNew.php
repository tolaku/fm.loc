<?php
namespace app\controllers;
/**
 * Description of PostsNew
 *
 * @author Анатолий
 */
class PostsNew extends App {
    public function indexAction(){
        echo 'PostsNew::index';
    }
    
    public function testAction(){
        echo 'PostsNew::test';
    }
    
    public function testPageAction(){
        echo 'PostsNew::testPage';
    }
    
    public function before(){
        echo 'PostsNew::before';
    }
}
