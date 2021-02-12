<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 16:56:19
 * @Last Modified by:   root
 * @Last Modified time: 2021-02-10 16:58:42
 */

class App{

    static $db = null;

    static function getDatabase(){
        if(!self::$db){
            self::$db = new Database('root', '', 'fenouille-bdd');
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