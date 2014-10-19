<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\abstraction\Base;
use app\lib\Registry;
use app\lib\Configuration;
use app\lib\BreadCrumb;
use app\lib\Sessions;
use app\lib\Notification;
use app\lib\Model;

class Application extends Base {

    protected $controller = null;
    protected $action = null;
    protected $registry = null;
    protected $_url;

    public function __construct() {

        parent::__construct();

        $this->registry = Registry::getInstance();
        Registry::extractControllers();
        Registry::instantinateViewRenderer();
        Registry::registerObject('info', Notification::getInstance());
        Registry::registerObject('db', new Model());
        //Registry::showAllRegistred();
        
    }

    protected function setNames() {

        $conf = Configuration::getConfig();
        $defaultController = $conf['default.controller'];
        $defaultAction = $conf['default.action'];

        $this->controller = (filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_SPECIAL_CHARS) != null) ? filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_SPECIAL_CHARS) : $defaultController;
        $this->action = (filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) != null) ? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) : $defaultAction;
        //echo $this->controller . '/' . $this->action;

        Sessions::createSession($this->controller, $this->action);
        $this->controller = Sessions::returnController();
        $this->action = Sessions::returnAction();
        //echo session_id();
        
    }

    public function run() {

        try {

            $this->setNames();
            $vars = null;

            $object = ucfirst($this->controller);

            $objectMethod = $this->action;
            //pobranie z rejestru zainicjalizowanego wcześniej obiektu danej klasy/kontrolera

            $getClass = $this->registry->$object;
            //wywołanie żądanej metody tej klasy/kontrolera

            $renderer = $this->registry->ViewRenderer;
            $vars = $getClass->$objectMethod();

            BreadCrumb::setControllerAndAction($this->controller, $this->action);
            $getClass->setViewRenderer($renderer, $vars, $this->controller, $objectMethod);

            //$this->render($vars, $this->controller, $objectMethod);
        } catch (\Exception $ex) {

            $conf = Configuration::getConfig();
            
            $user = !empty($_SESSION['user']) ? $_SESSION['user'] : 'Unlogged User' ;

            if ($conf['app.env'] == 'production') {
                $error = $this->registry->Error;
                \error_log(date('Y-m-d H:i:s') . ', ' . $user . ' || ' . $ex, 3, 'errors.txt');
                $error->details($ex, 'index');
                $this->render($vars, 'Error', 'index');
            } else {
                $error = $this->registry->Error;
                \error_log(date('Y-m-d H:i:s') . ', ' . $user . ' || ' . $ex, 3, 'errors.txt');
                $error->details($ex, 'error');
                $this->render($vars, 'Error', 'error');
            }
            
        }
    }

    /**
     * Metoda służąca tylko do renderowania widoku klasy Error lokalnego \Exception
     * @param mixed $variables
     * @param string $class
     * @param string $action
     * @throws \Exception
     */
    private function render($variables, $class, $action) {


        ($variables == null) ? $variables = array() : extract($variables);

        $filename = 'layout/header.phtml';
        if (file_exists($filename)) {
            include_once $filename;
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
