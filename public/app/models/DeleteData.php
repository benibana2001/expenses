<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-25
 * Time: 16:26
 */
abstract class DeleteData
{
    public $dbHandler;

    public function __construct()
    {
        $this->dbHandler = DBConnector::createHandler();
    }

    // SQLを発行してデータを削除する
    protected abstract function deleteData();
}
