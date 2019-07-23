<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-18
 * Time: 14:38
 */

/**
 * Class DBConnect
 * DB接続用のクラス
 */
class DBConnect
{
    private $dsn;
    private $usr;
    private $pwd;

    public $dbHandler;

    public function __construct($dsn, $usr, $pwd)
    {
        $this->dsn = $dsn;
        $this->usr = $usr;
        $this->pwd = $pwd;
    }

    public function connect()
    {
        try{
            $this->dbHandler = new \PDO($this->dsn, $this->usr, $this->pwd);
        } catch (\PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
