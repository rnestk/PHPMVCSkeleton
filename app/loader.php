<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function loader($namespace){
    $rowPath = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);
    $path = $rowPath . '.php';
    if(!file_exists($path)){
        //echo ' Sciezka: ' . $path . ' ';
        throw new \Exception("Brak pliku " . $path . ' w katalogach aplikacji.');
    } else {
        include_once $path;
    }
}

spl_autoload_register('loader');
