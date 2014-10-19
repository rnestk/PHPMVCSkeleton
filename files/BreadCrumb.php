<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\lib\Configuration;

class BreadCrumb {

    protected $links = false;

    protected static function getBCArray() {
        return include_once('config/bcConfig.php');
    }

    private static function makePath() {

        $map = self::getBCArray();
        $controller = filter_input(INPUT_GET, 'controller');
        $action = filter_input(INPUT_GET, 'action');
        $config = Configuration::getConfig();

        if (!$controller) {
            $controller = $config['default.controller'];
        }
        if (!$action) {
            $action = $config['default.action'];
        }

        $path = "";
        $link = "";
        $parentCtrl = $map[$controller]; // podtablica zadanego kontrolera
        $mainSiteName = $map[$config['default.controller']][$config['default.action']]; // nazwa strony głównej

        switch ($controller) {
            case $config['default.controller']:
                if ($action == 'index') {
                    $path = $mainSiteName;
                    //$link = self::parsePath($path, $map, $config['default.controller'], $config['default.action']);
                } else {
                    $path = $mainSiteName . '/' . $parentCtrl[$action];
                    //$link = self::parsePath($path, $map, $controller, $action);
                }
                break;
            default:
                $path = $path = $mainSiteName . '/' . $parentCtrl[$action];
                //$link = self::parsePath($path, $map, $controller, $action);
                break;
        }
        return $path;
    }

    protected static function parsePath($path, $array, $controller = '', $action = '') {
        $link = false;
        $rowLink = explode("/", $path);

//        echo '<pre>';
//        print_r($rowLink);
//        echo '</pre>';
//        echo '</br>';

        $temp = array();
        for ($i = 0; $i < count($rowLink); $i++) {

            if (preg_match("/^(.*)\*(.*)$/", $rowLink[$i])) {

                $tabLink = explode("*", $rowLink[$i]);
                $url = "?controller=$controller&action=$tabLink[1]";
                $link = "<a href = '$url'>$tabLink[0]</a> >> <a href = '$url'>$tabLink[0]</a>";
                echo '<pre>';
                print_r($tabLink);
                echo '</pre>';
                echo '</br>';
            } else {
                $url = "?controller=$controller&action=$action";
                $link = "<a href = '$url'>$rowLink[0]</a>";
            }
        }

        return $link;
    }

    public static function createBC() {
        return self::makePath();
    }

}
