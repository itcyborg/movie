<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/26/2018
 * Time: 10:35 AM
 */

class Storage
{
    public static $destination='/storage/';
    public static function store($file,$destination =null)
    {
        (is_null($destination))? $destination=$file['name']:$destination.'.'.pathinfo($file['name'],PATHINFO_EXTENSION);
        if(move_uploaded_file($file['tmp_name'],App::$root.self::$destination.$destination)){
            return self::$destination.$destination;
        }else{
            die('Failed to upload file');
        }
    }

    public static function download($file)
    {
        if (is_readable($file)){
            return $file;
        }elseif(is_readable(App::getRoot().$file)){
            return App::getRoot().$file;
        }
    }
}