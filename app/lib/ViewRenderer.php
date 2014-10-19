<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\abstraction\Base;
use app\lib\UrlHelper;
use app\lib\Notification;

class ViewRenderer extends Base {

    public function _url($controller, $action, array $list = null) {
        return UrlHelper::url($controller, $action, $list);
    }

    public function renderView($variables, $class, $action) {
        
        ($variables == null) ? $variables = array() : extract($variables);

        $filename = 'layout/header.phtml';
        if (file_exists($filename)) {
            include_once $filename;
            // W TYM MIEJSCU DRUKUJEMY POWIADOMIENIA
            Notification::show('cookies', 'notify');
        } else {
            throw new \Exception("Brak pliku $filename.");
        }


        $filename = 'views/' . $class . '/' . $action . '.phtml';
        if (file_exists($filename)) {
            include_once $filename;
        } else {
            throw new \Exception("Brak pliku $filename.");
        }


        $filename = 'layout/footer.phtml';
        if (file_exists($filename)) {
            include_once $filename;
        } else {
            throw new \Exception("Brak pliku $filename.");
        }
    }

}
