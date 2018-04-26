<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/24/2018
 * Time: 6:13 PM
 */

class Request
{
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function uri()
    {
        return trim(
            parse_url(
                $_SERVER['REQUEST_URI'],
                PHP_URL_PATH
            ),
            '/'
        );
    }
}