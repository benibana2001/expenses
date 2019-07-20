<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-19
 * Time: 02:10
 */

require_once 'bin/vendor/autoload.php';

use Handler\GetAllMonth;
//use Handler\GetEachMonth;

use WriteData\WriterHTML;
use WriteData\WriterJson;

// 全てのデータを取得
// ~/index.php
$handler = new GetAllMonth();

$data = $handler->getData();

//$writer = new WriterHTML($data);
$writer = new WriterJson($data);

$writer->write();

//
// 月別のデータを取得
// ~/index.php?month=20180801


/*
echo '<pre>';
var_dump($data);
echo '</pre>';
*/
