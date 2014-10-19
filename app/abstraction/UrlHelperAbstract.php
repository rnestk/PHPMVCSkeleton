<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\abstraction;

abstract class UrlHelperAbstract {

    public static function url($controller, $action, array $list = null) {

        if ($controller == null || $action == null) {
            throw new \Exception("Brak wartości dla kontrolera lub akcji w " . __METHOD__ . '.');
        }

        $text = '?controller=' . $controller . '&action=' . $action;

        if ($list != null) {
            if (count($list) > 0) {
                foreach ($list as $key => $val) {
                    $text .= "&{$key}={$val}";
                }
            }
        }

        return $text;
    }

}
