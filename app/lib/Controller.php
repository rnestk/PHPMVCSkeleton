<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\abstraction\Base;
use app\lib\ViewRenderer;
use app\lib\Redirector;

class Controller extends Base {
    
    public function _redirect($controller, $action, Array $a){
        Redirector::redirect($controller, $action, $a);
    }
    
    public function refresh($controller, $action, $time){
        Redirector::refresh($controller, $action, $time);
    }

    public function setViewRenderer(ViewRenderer $view, $variables, $class, $action) {
        $view->renderView($variables, $class, $action);
    }
    
    public function index() {
        
    }

}
