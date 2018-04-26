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
        self::$root=$root;
        Router::load('routes/routes.php')
            ->direct(Request::uri(),Request::method());
    }

    /**
     * @return mixed
     */
    public static function getRoot()
    {
        return self::$root;
    }

}