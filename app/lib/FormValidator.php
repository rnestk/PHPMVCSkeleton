<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\abstraction\IFormValidate;
use app\lib\Registry;
use app\lib\Model;
use app\lib\Configuration;

class FormValidator implements IFormValidate {

    public function isEmptyField($subject) {
        if (empty($subject) || $subject == '' || !isset($subject)) {
            return true;
        } else {
            return false;
        }
    }

    public function trimmer($subject) {
        return trim($subject);
    }

    /**
     * Returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal. 
     * @param string $subject1
     * @param string $subject2
     */
    public function validateConfirm($pass, $hash) {
        if (crypt($pass, $hash) == $hash) {
            return true;
        } else {
            return false;
        }
    }

    public function validateLength($subject, $length) {
        if (strlen(trim($subject)) > $length) {
            return false;
        } else {
            return true;
        }
    }

    public function isToShort($subject) {
        $config = Configuration::getConfig();
        $minLength = $config['app.password.min.length'];
        if (strlen(trim($subject)) < $minLength) {
            return true;
        } else {
            return false;
        }
    }

    public function validateWithRegex($subject, $regex) {
        
    }

    /* @var $link Model */

    public function validateUnique($subject, $column) {

        $link = Registry::returnObject('db');
        if (empty($link) || !isset($link)) {
            throw new \Exception("Brak zarejestrowanego obiektu 'db'.");
        }
        $query = "SELECT * "
                . "FROM humans "
                . "WHERE "
                . "$column = '$subject'";
        $result = $link->query($query);
        if ($link->errno) {
            throw new \Exception($link->error);
        }
        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function validateEmail($subject) {
        return filter_var(trim($subject), FILTER_VALIDATE_EMAIL);
    }
    
    public function comparePasswords($pass, $confirm){
        return strcmp($pass, $confirm);
    }

}
