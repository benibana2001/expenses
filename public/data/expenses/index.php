<?php

ini_set('display_errors', 1);

require_once('../../Kakeibo.php');
$is_local = strpos($_SERVER["HTTP_HOST"], 'localhost') !== false ? true : false;

$HOSTNAME =  $is_local ? '160.16.226.182': 'localhost';
$USERNAME = $is_local ? 'yusuke': 'root';
$PWD = $is_local ? 'yusukesantya': 'yusukesantya';
$kakeibo = new Expenses('mysql:dbname=kakeibo; host='.$HOSTNAME.'; port=3306; charset=utf8', $USERNAME, $PWD);

$kakeibo->connect();

$data = $kakeibo->viewMonth($_GET["month"]);
//$data = $kakeibo->viewMonth(20180701);

$kakeibo->createJson($data);
