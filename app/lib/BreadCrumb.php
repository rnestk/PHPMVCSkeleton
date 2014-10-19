<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\lib\Configuration;
use app\lib\GetConfig;

class BreadCrumb {

    //protected $links = false;
    protected static $controller = false;
    protected static $action = false;
    
    public static function setControllerAndAction($controller, $action){
        self::$controller = $controller;
        self::$action = $action;
    }

    protected static function getBCArray() {
        return include_once('config/bcConfig.php');
    }

    protected static function makePath() {

        $map = GetConfig::config('bc');
//        $controller = filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_SPECIAL_CHARS);
//        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = self::$controller;
        $action = self::$action;
        $config = Configuration::getConfig();

        if (!$controller) {
            $controller = $config['default.controller'];
        }
        if (!$action) {
            $action = $config['default.action'];
        }
        
        $resultMap = $map[$controller][$action];
        
        if(!array_key_exists($controller, $map)){
            throw new \Exception("BreadCrumbs error - prawdopodobyn brak ścieżki w tablicy z pliku bcConfig.php."
                    . " Uzupełnij tablicę o nowy wpis.");
        }
        
        if(!array_key_exists($action, $map[$controller])){
            throw new \Exception("BreadCrumbs error - prawdopodobyn brak ścieżki w tablicy z pliku bcConfig.php");
        }
        
        return $resultMap;
    }

    
    /**
     * Metoda wywoływana wyłacznie w layoucie lub widoku. Drukuje linki breadcrumbs.
     * @return String
     */
    public static function createBC() {
        return self::makePath();
    }

}
