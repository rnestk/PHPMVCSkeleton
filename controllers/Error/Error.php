<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers\Error;

use app\lib\Controller;

class Error extends Controller {
    
    public function error(){
        
    }

    public function details(\Exception $error, $action) {
        include_once 'views/error/' . $action . '.phtml';
    }

}
