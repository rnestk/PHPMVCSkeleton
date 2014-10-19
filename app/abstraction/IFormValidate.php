<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\abstraction;

interface IFormValidate {
    function validateUnique($subject, $column);
    function validateLength($subject, $length);
    function validateEmail($subject);
    function validateConfirm($subject1, $subject2);
    function validateWithRegex($subject, $regex);
    function trimmer($subject);
    function isEmptyField($subject);
}

