<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 17:01:55
 * @Last Modified by:   root
 * @Last Modified time: 2021-02-10 17:02:06
 */

class Session{

    static $instance;

    static function getInstance(){
        if(!self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function __construct(){
        session_start();
    }

    public function setFlash($key, $message){
        $_SESSION['flash'][$key] = $message;
    }
    
    public function hasFlashes(){
        return isset($_SESSION['flash']);
    }

    public function getFlashes(){
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    public function write($key, $value){
        $_SESSION[$key] = $value;
    }

    public function read($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function delete($key){
        unset($_SESSION[$key]);
    }

}