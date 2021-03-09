<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 17:03:00
 * @Last Modified by:   Mockingbird01001
 * @Last Modified time: 2021-03-09 20:35:49
 */

class Validator{

    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function getField($field){
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }

    public function isAlpha($field, $errorMsg){
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field))) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isEmail($field, $errorMsg)
    {
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isUniq($field, $db, $table, $errorMsg){
        $record = $db->query("SELECT id FROM $table WHERE $field = ?", [$this->getField($field)])->fetch();
        if ($record) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isPhone($field, $errorMsg){
        if(!preg_match('/^([+]{0,1}[0-9]{0,2})[0-9]{9,10}$/', $this->getField($field))){
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isNum($field, $errorMsg){
        if (!is_numeric($this->getField($field))) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isSized($field, $minSize, $maxSize, $errorMsg, $errorMsg1){
        if(!(strlen(trim($this->getField($field))) >= $minSize)){
            $this->errors[$field] = $errorMsg;
            return false;
        }   
        if(!(strlen(trim($this->getField($field))) <= $maxSize)){
            $this->errors[$field] = $errorMsg1;
            return false;
        }   
        return true;
    }

    public function isConfirmed($field, $errorMsg)
    {
        $value = $this->getField($field);
        if (empty($value) || $value != $this->getField($field .'_confirm')) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isHere($db, $table, $field, $value){
        $record = $db->query("SELECT id FROM $table WHERE $field=?", [$value])->fetch();
        if ($record) {
            return false;
        }
        return true;
    }
    
    public function isChecked($field, $errorMsg){
        if(null != $this->getField($field) and $this->getField($field) === 'conditions--accepted'){
            return true;
        }
        return false;
    }

    public function isValid(){
        return empty($this->errors);
    }

    public function getErrors(){
        return $this->errors;
    }
}