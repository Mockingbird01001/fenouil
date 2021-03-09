<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 17:04:12
 * @Last Modified by:   Mockingbird01001
 * @Last Modified time: 2021-03-07 03:01:51
 */

spl_autoload_register('app_autoload');

function app_autoload($className){
    require_once "class/$className.php";
}