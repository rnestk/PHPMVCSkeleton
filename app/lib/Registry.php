<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;
use app\lib\ViewRenderer;

class Registry {

    private static $instance = null;
    private static $livingObjects = array();

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Registry();
        }
        return self::$instance;
    }

    public function __clone() {
        throw new Exception("Registry nie może być klonowane.");
    }

    public function __get($name) {
        if (!array_key_exists($name, self::$livingObjects)) {
            throw new \Exception("Obiekt $name nie został zarejestrowany.");
        } else {
            return self::$livingObjects[$name];
        }
    }

    public function __set($name, $value) {
        //self::$livingObjects[$name] = $value;
        throw new \Exception("Metoda nieużywana.");
    }

    public static function extractControllers() {
        $directory = 'controllers';
        $controllers = scandir($directory);
        
        if(!$controllers){
            throw new \Exception("Brak katalogu kontrolerów - $directory.");
        }
        
        if(count($controllers) == 0){ 
            throw new \Exception("Brak katalogu kontrolerów - $directory.");
        }
        
        foreach ($controllers as $val) {
            if ($val != '.' && $val != '..') {
                $newObject = '\controllers\\' . str_replace('.php', '', $val) . '\\' . str_replace('.php', '', $val);
                self::$livingObjects[str_replace('.php', '', $val)] = new $newObject();
            }
        }
    }

    public static function showAllRegistred() {
        echo '<pre>';
        print_r(self::$livingObjects);
        echo '</pre>';
    }
    
    public static function instantinateViewRenderer(){
        self::$livingObjects['ViewRenderer'] = new ViewRenderer();
    }
    
    public static function registerObject($name, $object){
        self::$livingObjects[$name] = $object;
    }
    
    public static function returnObject($name){
        return self::$livingObjects[$name];
    }
    
    
}
