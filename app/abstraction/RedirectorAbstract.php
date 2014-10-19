<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\abstraction;

use app\abstraction\Base;

abstract class RedirectorAbstract extends Base {

    public static function redirect($controller, $action, Array $opts = null) {
        $request = "?controller=$controller&action=$action";
        if ($opts != null) {
            foreach ($opts as $key => $val) {
                $request .= "&" . $key . "=" . $val;
            }
        }
        header("Location: $request");
    }

    public static function refresh($controller, $action, $time = false) {
        if (!$time) {
            header("refresh:url=?controller=$controller&action=$action");
        } else {
            header("refresh:$time;url=?controller=$controller&action=$action");
        }
    }

}
