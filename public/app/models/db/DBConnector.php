<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-18
 * Time: 15:16
 */
class DBConnector
{
    public static function createHandler() {
        $ini_array = parse_ini_file("database_info.ini", true);

        $dsn = $ini_array["host.local"]["dsn"];
        $usr = $ini_array["host.local"]["usr"];
        $pwd = $ini_array["host.local"]["usr"];

        $db = new DBConnect($dsn, $usr, $pwd);

        $db->connect();

        $dbHandler = $db->dbHandler;

        return $dbHandler;
    }
}
