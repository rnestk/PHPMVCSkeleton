<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers\CD;

use app\lib\Controller;
use models\CdModel;
use app\lib\Paginator;

class Cd extends Controller {
    
    public function show() {
        
        $model = new CdModel();
        $model->set_charset('utf8');
        $db = Paginator::getInstance($model, 5, 'cd');
        $result = $db->queryGet(array('id', 'artist', 'title'), 'cd');
        
        return array(
            'result' => $result,
            'db' => $db,
        );
    }
    
}