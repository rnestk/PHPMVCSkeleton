<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\abstraction;

abstract class ConfigurationAbstract {
    
    public static function getConfig(){
        $filename = 'config/config.ini';
        $config = parse_ini_file($filename);
        if(!$config){
            throw new Exception("Błąd przetwarzania pliku konfiguracyjnego.");
        }
        return $config;
    }
    
}

