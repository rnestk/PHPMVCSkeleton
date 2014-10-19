<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers\Gady;

use app\lib\Controller;
use models\GadyModel;

class Gady extends Controller {
    /* @var $db SsakiModel */

    public function index() {
        $db = new GadyModel();
        $resArray = $db->returnResult();

        return array(
            'resArray' => $resArray,
        );
    }

}
