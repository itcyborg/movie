<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/24/2018
 * Time: 6:16 PM
 */

class Router
{
    public static $routes=[
        'GET'=>[],
        'POST'=>[]
    ];
    public static $action=[
        'GET'=>[],
        'POST'=>[]
    ];
    public static function load($file)
    {
        $router=new static;
        require $file;
        return $router;
    }

    public static function direct($uri,$requestType)
    {
        if(in_array($uri,self::$routes[$requestType])){
            return Controller::load(self::$action[$requestType][$uri]);
        }else{
            die('page not found');
        }
    }

    public static function get($uri,$action)
    {
        self::$routes['GET'][]=$uri;
        self::$action['GET'][$uri]=$action;
    }

    public static function post($uri,$action)
    {
        self::$routes['POST'][]=$uri;
        self::$action['POST'][$uri]=$action;
    }
}