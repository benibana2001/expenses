<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 08:44
 */
require_once 'DB/DBConnector.class.php';

abstract class GetData
{
    public $dbHandler;

    public function __construct()
    {
        $this->dbHandler = DBConnector::createHandler();
    }

    // SQLを発行してデータを取得する
    protected abstract function getData();
}
