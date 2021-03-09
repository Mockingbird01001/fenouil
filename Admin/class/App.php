<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 16:56:19
 * @Last Modified by:   Mockingbird01001
 * @Last Modified time: 2021-03-08 23:11:28
 */

class App{

    static $db = null;

    static function getDatabase(){
        if(!self::$db){
            self::$db = new Database('root', '', 'fenouil_database');
        }
        return self::$db;
    }

    static function getAuth(){
        return new Auth(Session::getInstance(), ['restriction_msg' => "You can't access this page !"]);
    }

    static function redirect($page){
        header("Location: ".$page);
        exit();
    }

    static function resetHeader(){
        header_remove();
        exit();
    }

}