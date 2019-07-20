<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-19
 * Time: 02:10
 */
require_once './bin/GetAllMonth.class.php';

$handler = new GetAllMonth();

$data = $handler->getData();

echo '<pre>';
var_dump($data);
echo '</pre>';
