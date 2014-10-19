<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\lib\GetConfig;

class Notification {

    protected static $info = array();
    protected static $instance = false;

    private function __construct() {
        $config = GetConfig::config('notification');
        self::$info = array_merge($config);
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Notification();
        }
        return self::$instance;
    }

    public static function collectInformation($name, $info) {
        self::$info[$name] = $info;
    }
    
    public static function showAll(){
        echo '<pre>';
        print_r(self::$info);
        echo '</pre>';
    }

    public static function show($info, $class = '') {

        if (array_key_exists($info, self::$info)) {
            $information = self::$info[$info];
            $style = "z-index:999;";
            if ($class != '') {
                $style = "";
            }
            echo "<div class = '$class' style = '$style'>";
            echo "<p>$information</p>";
            echo "</div>";
        } else {
            return;
        }
    }

}
