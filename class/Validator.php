<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 17:03:00
 * @Last Modified by:   root
 * @Last Modified time: 2021-02-10 17:03:03
 */

class Validator{

    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function getField($field)
    {
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }
}