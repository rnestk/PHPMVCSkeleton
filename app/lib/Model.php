<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\lib\Configuration;
use \mysqli;

class Model extends mysqli {

    public function __construct() {
        
        $configs = Configuration::getConfig();
        $host = $configs['db.host'];
        $db = $configs['db.dbname'];
        $pass = $configs['db.password'];
        $user = $configs['db.username'];
        
        parent::__construct($host, $user, $pass, $db);
        
        if(\mysqli_connect_error()) {
            throw new \Exception("Błąd połączenia z MySQL.</br>" . mysqli_connect_error());
        }
                
    }

}
