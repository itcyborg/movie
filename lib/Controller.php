<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/24/2018
 * Time: 6:36 PM
 */

class Controller
{
    public static $controller='controller/';
    public static function load($action)
    {
        if(is_callable($action)){
            return call_user_func($action);
        }else{
            dd($action);
        }
    }
}