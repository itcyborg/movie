<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/23/2018
 * Time: 6:10 PM
 */

require 'lib/Request.php';
require 'lib/Router.php';
require 'lib/View.php';
require 'lib/Controller.php';
require 'lib/DB.php';
require 'lib/Storage.php';
require 'lib/App.php';

function dd($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

App::run(__DIR__);