<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers\Ssaki;

use app\lib\Controller;
use models\SsakiModel;

class Ssaki extends Controller {
    
    /* @var $db SsakiModel */
    public function index() {
        $db = new SsakiModel();
        $resArray = $db->returnResult();
        
        return array(
            'resArray' => $resArray,
        );
        
    }

   
}
