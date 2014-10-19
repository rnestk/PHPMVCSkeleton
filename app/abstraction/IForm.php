<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\abstraction;

interface IForm {
    public function startForm();
    public function createTextField(Array $optionList);
    public function createTextArea(Array $optionList);
    public function createEmailField(Array $optionList);
    public function createPasswordField(Array $optionList);
    public function createCheckBox(Array $optionList);
    public function createRadio(Array $optionList);
    public function createSelect(Array $optionsList);
    public function createFileSelection(Array $optionList);
    public function createHiddenFile(Array $optionList);
    public function createSubmitButton(Array $optionList);
    public function createResetButton(Array $optionList);
    public function createFieldSet(Array $optionList);
    public function createSearchField(Array $optionList);
    public function createRangeField(Array $optionList);
    public function createColorField(Array $optionList);
    public function createImageField(Array $optionList);
    public function createLabel(Array $optionList);
    public function createOutputField(Array $optionList);
    public function endForm();
    
}