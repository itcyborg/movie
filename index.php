<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/23/2018
 * Time: 6:10 PM
 */

//required files
require 'lib/Request.php';
require 'lib/Router.php';
require 'lib/View.php';
require 'lib/Controller.php';
require 'lib/DB.php';
require 'lib/Storage.php';
require 'lib/App.php';

//a function to display output to help in debuggind
function dd($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}
//boot the application
App::run(__DIR__);