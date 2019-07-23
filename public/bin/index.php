<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 16:39
 */
define('INC_ROOT', dirname(__DIR__));

require './vendor/autoload.php';
//require_once 'App/AppController.php';

$router = new AppController();
