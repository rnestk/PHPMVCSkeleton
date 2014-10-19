<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\abstraction;

use app\lib\Configuration;

/**
 * @author Piotr Klimaszewski <rnestk@interia.pl>
 * @abstract
 * <b>Klasa bazowa aplikacji. Tworzy interfejs, którego zaimplementowanie daje podstawową funkcjonalność aplikacji.</b>
 */
abstract class Base {

    /**
     * @invisible
     * 
     */
    public function __construct() {
        
        $configs = Configuration::getConfig();
        $env = $configs['app.env'];

        if ($env == "production") {
            error_reporting(0);
        } else if ($env == "development") {
            error_reporting(-1);
        } else {
            throw new \Exception("Błąd składni pliku konfiguracyjnego.");
        }
    }

    /**
     * @invisible
     * @param type $name
     * @param type $arguments
     */
    public function __call($name, $arguments) { 
        throw new \Exception('</br>Wywołano nieistniejącą w klasie ' . get_called_class() . ' metodę ' . $name . '</br>');
    }

    /**
     * @invisible
     * @param type $name
     */
    public function __get($name) {
        throw new \Exception('</br>Wywołano metodę __get() klasy ' . get_called_class() . '.</br>');
    }

    /**
     * @invisible
     * @param type $name
     * @param type $value
     */
    public function __set($name, $value) {
        throw new \Exception('</br>Wywołano metodę __set() klasy ' . get_called_class() . '.</br>');
    }
    
    
}
