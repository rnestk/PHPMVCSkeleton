<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

use app\abstraction\IForm;

class FormHelper implements IForm {

    protected $method = null;
    protected $action = null;
    protected $enctype = null;
    protected $autocomplete = null;
    protected $novalidate = null;
    
    protected $textFieldValue = '';
    protected $emailFieldValue = ''; 
    
    /**
     * <b>Klasa ułatwia szybkie tworzenie formularzy.</b>
     * Parametry:
     * method = post || get, itp.
     * controller + action = akcja formularza
     * @param string $method
     * @param string $controller
     * @param string $action
     * @param string $enctype
     * @param string $autocomplete
     * @param string $novalidate
     */

    public function __construct($method, $controller, $action, $enctype = '', 
            $autocomplete = 'off', $novalidate = 'novalidate') {

        $this->method = $method;
        $this->action = "index.php?controller=$controller&action=$action";
        $this->enctype = $enctype;
        $this->autocomplete = $autocomplete;
        $this->novalidate = $novalidate;
        
    }
    
    public function setTextFieldValue($value){
        $this->textFieldValue = $value;
    }
    
    public function setEmailFieldValue($value){
        $this->emailFieldValue = $value;
    }

    public function createCheckBox(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createFieldSet(Array $optionList) {
        
    }

    public function createFileSelection(Array $optionList) {
        
    }

    public function createHiddenFile(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createPasswordField(Array $optionList) {
        $name = 'password';
        $value = '';
        $id = '';
        $class = '';
        $maxlength = 45;
        $size = 45;
        $autofocus = '';
        $required = '';
        $placeholder = 'Wpisz hasło';
        $list = '';
        extract($optionList, EXTR_OVERWRITE);
        return "<input type = 'password' name = '$name' value = '$value' id = '$id' class = '$class'"
                . " maxlength = '$maxlength' size = '$size' autofocus = '$autofocus' "
                . "required = '$required' placeholder = '$placeholder' list = '$list'/>";
    }

    public function createRadio(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createResetButton(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createSelect(Array $optionList) {
        
    }

    public function createSubmitButton(Array $optionList) {
        $name = '';
        $value = 'Wyślij';
        $id = '';
        $class = '';
        extract($optionList, EXTR_OVERWRITE);
        return "<input type = 'submit' name = '$name' value = '$value' id = '$id' class = '$class' />";
    }

    public function createTextArea(Array $optionList) {
        return "<textarea name = '' cols = '' rows = '' readonly = '' id = '' class = ''></textarea>";
    }

    public function createTextField(Array $optionList) {
        $name = 'text';
        $value = $this->textFieldValue;
        $id = '';
        $class = '';
        $maxlength = 45;
        $size = 45;
        $autofocus = '';
        $required = '';
        $placeholder = 'Wpisz tekst';
        $list = '';
        $autocomplete = 'off';
        extract($optionList, EXTR_OVERWRITE);
        return "<input type = 'text' name = '$name' value = '$value' id = '$id' class = '$class'"
                . " maxlength = '$maxlength' size = '$size' autofocus = '$autofocus' "
                . "required = '$required' placeholder = '$placeholder' list = '$list' autocomplete = '$autocomplete'/>";
    }

    public function endForm() {
        return '</form>';
    }

    public function startForm($cssClass = '') {
        return "<form class = '$cssClass' method = '$this->method' action = '$this->action' "
                . "enctype = '$this->enctype' novalidate = '$this->novalidate' autocomplete = '$this->autocomplete'>";
    }

    public function createSearchField(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createColorField(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createImageField(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createRangeField(Array $optionList) {
        return "<input type = '' name = '' value = '' id = '' class = '' />";
    }

    public function createLabel(Array $optionList) {
        $title = '';
        $id = '';
        $class = '';
        extract($optionList, EXTR_OVERWRITE);
        return "<label id = '$id' class = '$class'>$title</label>";
    }

    public function createEmailField(Array $optionList) {
        $name = 'email';
        $value = $this->emailFieldValue;
        $id = '';
        $class = '';
        $maxlength = 45;
        $size = 45;
        $autofocus = '';
        $required = '';
        $placeholder = 'Wpisz swój adres email';
        $list = '';
        $autocomplete = 'off';
        extract($optionList, EXTR_OVERWRITE);
        return "<input type = 'email' name = '$name' value = '$value' id = '$id' class = '$class'"
        . " maxlength = '$maxlength' size = '$size' autofocus = '$autofocus' "
                . "required = '$required' placeholder = '$placeholder' list = '$list'  autocomplete = '$autocomplete'/>";
    }

    public function createOutputField(Array $optionList) {
        
    }

}
