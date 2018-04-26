<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/24/2018
 * Time: 6:19 PM
 */

class View
{
    public static $dir='views/';
    public static function load($viewName,$data=null)
    {
        (is_null($data))?:extract($data);
        if(is_readable(self::$dir.$viewName.'.php'))
            require (self::$dir.$viewName.'.php');
        else
            die('View not found');
    }

    public static function asset($assetName)
    {
        echo self::$dir.$assetName;
    }
}