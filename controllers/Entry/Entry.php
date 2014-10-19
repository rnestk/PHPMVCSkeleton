<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers\Entry;

use app\lib\Controller;
use app\lib\FormHelper;
use app\lib\FormValidator;
use app\lib\Registry;
use app\lib\Model;
use app\lib\Configuration;

class Entry extends Controller {
    /* @var $db Model */

    public function register() {

        $form = new FormHelper('post', 'entry', 'register');
        $errors = array();
        $ids = array();

        if (filter_input(INPUT_POST, 'send') != null) {

            $fv = new FormValidator();

            $emptyLogin = $fv->isEmptyField(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS));
            $emptyEmail = $fv->isEmptyField(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));

            if ($emptyLogin) {
                //echo '<h2>Wpisz login.</h2>';
                array_push($errors, 'Wpisz login.');
                array_push($ids, 'login');
            }

            if ($emptyEmail) {
                //echo '<h2>Wpisz adres email.</h2>';
                array_push($errors, 'Wpisz adres email.');
                array_push($ids, 'email');
            }

            $emptyPassword = $fv->isEmptyField(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
            $emptyConfirm = $fv->isEmptyField(filter_input(INPUT_POST, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS));

            if ($emptyPassword) {
                //echo '<h2>Wpisz hasło.</h2>';
                array_push($errors, 'Wpisz hasło.');
                array_push($ids, 'password');
            }

            if ($emptyConfirm) {
                //echo '<h2>Potwierdź hasło.</h2>';
                array_push($errors, 'Potwierdź hasło.');
                array_push($ids, 'confirm');
            }

            $resLogin = $fv->validateUnique(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS), 'login');
            $resEmail = $fv->validateUnique(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS), 'email');

            if (!$resLogin) {
                //echo '<h2>Login jest zajęty. Wybierz inny!</h2>';
                array_push($errors, 'Login jest zajęty. Wybierz inny!');
                array_push($ids, 'login');
            }

            if (!$resEmail) {
                //echo '<h2>Email jest zajęty. Wybierz inny!</h2>';
                array_push($errors, 'Email jest zajęty. Wybierz inny!');
                array_push($ids, 'email');
            }

            $resEmail = $fv->validateEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));

            if (!$resEmail && !$emptyEmail) {
                //echo "<h2>Wpisz poprawny adres email.</h2>";
                array_push($errors, 'Wpisz poprawny adres email.');
                array_push($ids, 'email');
            }

            $length = $fv->isToShort(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));

            if ($length) {
                $config = Configuration::getConfig();
                $min = $config['app.password.min.length'];
                array_push($errors, 'Hasło jest zbyt krótkie. Minimalna liczba znaków to ' . $min . '.');
                array_push($ids, 'password');
            }

            $subject1 = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $subject2 = filter_input(INPUT_POST, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $confirm = $fv->comparePasswords($subject1, $subject2);

            if ($confirm != 0) {
                array_push($errors, 'Hasła są różne.');
                array_push($ids, 'password');
            }

            $form->setEmailFieldValue(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
            $form->setTextFieldValue(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS));

            if (count($errors) == 0) {

                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $config = Configuration::getConfig();
                $salt = $config['app.salt'];
                $login = $data['login'];
                
                $password = crypt($data['password']);
                
                $email = $data['email'];

                $db = Registry::returnObject('db');
                $regDate = date('Y-m-d H:i:s');
                $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_SANITIZE_SPECIAL_CHARS);
                $query = "INSERT INTO "
                        . "humans "
                        . "(login, password, email, registration_date ,ip) "
                        . "VALUES "
                        . "('$login',"
                        . "'$password',"
                        . "'$email',"
                        . "'$regDate',"
                        . "'$ip'"
                        . ");";

                $result = $db->query($query);
                $db->close();
                if ($result->errno) {
                    throw new \Exception($result->error);
                }

//                $mailResult = mail($data['email'], 'registration', 'You just had been registered!');
//                
//                if(!$mailResult){
//                    throw new Exception("Wiadomość nie została wysłana.");
//                }
                $this->_redirect('entry', 'login', array('confirmation' => true));
            }

            return array(
                'post' => filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS),
                'form' => $form,
                'errors' => $errors,
                'ids' => $ids
            );
        }


        return array(
            'form' => $form
        );
    }

    public function login() {

        $form = new FormHelper('POST', 'entry', 'login');

        if (filter_input(INPUT_GET, 'confirmation', FILTER_SANITIZE_SPECIAL_CHARS)) {
            return array(
                'form' => $form,
                'confirm' => 'Rejestracja przebiegła pomyślnie. Można się zalogować.'
            );
        }

        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $errors = array();
        $ids = array();

        if (!empty($data)) {

            $fv = new FormValidator();

            $fvRes = $fv->isEmptyField($data['login']);

            if ($fvRes) {
                array_push($errors, 'Pole loginu nie może być puste.');
                array_push($ids, 'login');
            }

            $fvRes = $fv->validateLength($data['login'], 45);

            if (!$fvRes) {
                array_push($errors, 'Za długi login.');
                array_push($ids, 'login');
            }

            $fvRes = $fv->isEmptyField($data['password']);

            if ($fvRes) {
                array_push($errors, 'Pole hasła nie może być puste.');
                array_push($ids, 'password');
            }

            $form->setTextFieldValue($data['login']);

            if (empty($errors)) {

                $login = $data['login'];
                $config = Configuration::getConfig();
                $salt = $config['app.salt'];
                $password = $data['password'];

                $db = Registry::returnObject('db');
                $query = "SELECT * FROM "
                        . "humans "
                        . "WHERE "
                        . "login = "
                        . "'$login';";

                $result = $db->query($query);

                $resLoginArray = $result->fetch_assoc();
                $retrievedPassword = $resLoginArray['password'];
                
                if (!empty($resLoginArray)) {

                    $resultCompare = $fv->validateConfirm($password, $retrievedPassword);

                    if ($resultCompare) {

                        $_SESSION['user'] = $resLoginArray['login'];
                        $this->_redirect($config['default.controller'], $config['default.action'], array());
                        
                    } else {
                        array_push($errors, 'Brak użytkownika o podanym haśle i/lub loginie.');
                    }
                    //print_r($resLoginArray);
                } else {
                    array_push($errors, 'Brak użytkownika o podanym haśle i/lub loginie.');
                }



                $result->close();

                return array(
                    'form' => $form,
                    'errors' => $errors
                );
            }

            return array(
                'form' => $form,
                'ids' => $ids,
                'errors' => $errors
            );
        }

        return array(
            'form' => $form,
        );
    }

    public function logout() {
        $_SESSION['user'] = null;
        if (!empty($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        $this->refresh('main', 'index', 5);
    }

}
