<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 08:44
 */
namespace Handler;

use DB\DBConnector;

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
