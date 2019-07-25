<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 08:48
 */
class GetAllMonth extends GetData
{
    public function getData()
    {
        $data = $this->fetch();

        return $data;
    }

    private function fetch()
    {
        $sql = "SELECT M.id, M.date, E.e_name, M.price FROM main AS M
                INNER JOIN expenses AS E
                ON M.e_id = E.e_id
                ORDER BY M.date ASC ;";

        $data = array();
        $i = 0;
        foreach ($this->dbHandler->query($sql) as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['date'] = $row['date'];
            $data[$i]['e_name'] = $row['e_name'];
            $data[$i]['price'] = $row['price'];
            $i++;
        }

        return $data;

    }
}
