<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\lib\Configuration;
use app\lib\GetConfig;
use app\lib\Notification;

class Sessions {

    protected static $one = false;
    protected static $controller = false;
    protected static $action = false;

    private function __construct($controller, $action) {

        $conf = Configuration::getConfig();
        
        if ($conf['session.state'] == 1) {
            session_start();
            $cookieStatus = self::cookiesStatus();

            $cookieStatus ? : $_SESSION['user'] = null;

            if (!isset($_SESSION['user'])) {
                // ten blok wykonuje się gdy się wyloguje user, lub gdy wyłaczy cookies

                $name = GetConfig::config('session');

                self::$controller = $name['controller'];
                self::$action = $name['action'];

                if (\filter_input(\INPUT_GET, 'action', \FILTER_SANITIZE_SPECIAL_CHARS) === 'logout') {
                    self::$controller = 'entry';
                    self::$action = 'logout';
                } else if (\filter_input(\INPUT_GET, 'action', \FILTER_SANITIZE_SPECIAL_CHARS) === 'login') {
                    self::$controller = 'entry';
                    self::$action = 'login';
                } else if (\filter_input(\INPUT_GET, 'action', \FILTER_SANITIZE_SPECIAL_CHARS) === 'register') {
                    self::$controller = 'entry';
                    self::$action = 'register';
                } else {
                    $_SESSION['note'] = "Aby przejść do serwisu, należy się zalogować.";
                }
            } else {
                self::$controller = $controller;
                self::$action = $action;
            }
        } else if ($conf['session.state'] == 0) {
            self::$controller = $controller;
            self::$action = $action;
        } else {
            throw new \Exception("Błąd w pliku konfiguracyjnym 'config/config.ini' w polu session.state.");
        }
    }

    public static function createSession($controller, $action) {
        if (!self::$one) {
            self::$one = new Sessions($controller, $action);
        }
        return self::$one;
    }

    public static function returnController() {
        return self::$controller;
    }

    public static function returnAction() {
        return self::$action;
    }

    private static function cookiesStatus() {

        setcookie('check', 'testCookie');
        
        if (isset($_COOKIE['check'])) {
            return true;
        } else {
            header('Location:cookies.php');
//            $info = "Akceptacja cookies jest wyłaczona. Aby korzystać z serwisu, proszę właczyć cookies.";
//            $class = 'notify';
//            Notification::collectInformation('cookies', $info);
//            //Notification::showAll();
//            return false;
        }
    }

}
