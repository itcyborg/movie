<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/26/2018
 * Time: 10:12 AM
 */

class App
{
    public static $root;
    public static function run($root)
    {
        //set the document root
        self::$root=$root;
        Router::load('routes/routes.php')//load the routes file
            ->direct(Request::uri(),Request::method());//get the request information
    }

    /**
     * @return mixed
     */
    public static function getRoot()
    {
        return self::$root;
    }

}