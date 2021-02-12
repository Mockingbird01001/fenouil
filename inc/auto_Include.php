<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 17:04:12
 * @Last Modified by:   root
 * @Last Modified time: 2021-02-10 17:04:18
 */

spl_autoload_register('app_autoload');

function app_autoload($class){
    require "class/$class.php";
}