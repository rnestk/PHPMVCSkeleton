<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace models;

use app\lib\Model;

class SsakiModel extends Model {
    
    public function returnResult(){
        $db = new Model();
        $db->set_charset('utf8');
        $query = 'SELECT * FROM '
                . 'ssaki;';
        $res = $db->query($query);
        return $res;
    }
    
}

