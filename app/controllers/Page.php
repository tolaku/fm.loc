<?php

namespace app\controllers;

/**
 * Description of Page
 *
 * @author Анатолий
 */
class Page extends \vendor\core\base\Controller {
     public function viewAction(){
        debug($this->route);
        echo 'Page::view';
    }
}
