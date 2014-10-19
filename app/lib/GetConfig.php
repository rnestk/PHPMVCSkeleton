<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

class GetConfig {
    
    public static function config($fileName){
        return include_once('config/' . $fileName . "Config.php");
    }
    
}

