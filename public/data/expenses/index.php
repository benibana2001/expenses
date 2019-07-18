<?php

ini_set('display_errors', 1);

require_once ('../../Kakeibo.php');
$is_local = strpos($_SERVER["HTTP_HOST"], 'localhost') !== false ? true : false;

$HOSTNAME =  $is_local ? 'mysql': 'localhost';
$USERNAME = $is_local ? 'root': 'root';
$PWD = $is_local ? 'root': 'yusukesantya';
$kakeibo = new Kakeibo('mysql:dbname=kakeibo; host='.$HOSTNAME.'; port=3306; charset=utf8', $USERNAME, $PWD);

$kakeibo->connect();

$data = $kakeibo->viewMonth($_GET["month"]);
//$data = $kakeibo->viewMonth(20180701);

$kakeibo->createJson($data);