<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers\Ptaki;

use app\lib\Paginator;
use app\lib\Controller;
use models\PtakiModel;

class Ptaki extends Controller {

    public function index() {
        $db = new PtakiModel();
        $resArray = $db->returnResult();
        
        return array(
            'resArray' => $resArray,
        );
    }

    

}
