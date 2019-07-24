<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-24
 * Time: 10:49
 */
abstract class PostData
{
    public $dbHandler;

    public function __construct()
    {
        $this->dbHandler = DBConnector::createHandler();
    }

    // SQLを実行してデータを登録する
    protected abstract function postData();
}
