<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 09:02
 */
class GetEachMonth extends GetData
{
    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function getData()
    {
        $data = $this->fetch();

        return $data;
    }

    private function fetch()
    {
        $data = array();

        // TODO: $monthを外部より取得
        $month = $this->id;

        $sql = "SELECT M.date, E.e_name, M.price FROM main AS M
                INNER JOIN expenses AS E
                ON M.e_id = E.e_id 
                WHERE M.date >= " . $month . " AND M.date < " . $month . "+ INTERVAL 1 MONTH
                ORDER BY M.date ASC ";

        $i = 0;
        foreach ($this->dbHandler->query($sql) as $row) {
            $data[$i]['date'] = date("Y/m/d", strtotime($row['date']));
            $data[$i]['e_name'] = $row['e_name'];
            $data[$i]['price'] = $row['price'];
            $i++;
        }

        return $data;

    }

}
