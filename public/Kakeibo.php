<?php
class Kakeibo{
    public $dsn;
    public $usr;
    public $pwd;
    public $opts;
    public $db; //PDOインスタンス
    public $stt;

    function __construct($dsn, $usr, $pwd) {
        $this->dsn = $dsn;
        $this->usr = $usr;
        $this->pwd = $pwd;
//        $this->opts = array(
//            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//        );
    }

    // DBに接続する
    function connect(){
        try{
            // 接続オブジェクト
//            $this->db = new PDO($this->dsn, $this->usr, $this->pwd, $this->opts);
            $this->db = new PDO($this->dsn, $this->usr, $this->pwd);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function post(){
        try {
            $this->validateDate();
            $this->save();
//            header('Location: http://'. $_SERVER['HTTP_HOST'] . )
        }catch (\Exception $e){
            $emsg = $e->getMessage();
            var_dump($emsg);
//            echo 'fsdafsa';
        }
    }

    function validateDate(){
    if (
            !isset($_POST['date']) ||
            strlen($_POST['date']) < 4
        ) {
            throw new \Exception('invalid date!');
        }
    }

    function save(){
        $date = $_POST["date"];
        $price = (int)$_POST["price"];
        if(strlen($date) === 4){
           $date = 2018 . $date;
        };
        $sql = 'INSERT INTO `main` (ID, date, e_id, price) VALUES (null, :date, :e_id, :price);';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':e_id', $_POST["e_id"], \PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, \PDO::PARAM_INT);

        try {
            $stmt->execute();
            echo 'Success !';
            echo '<br>';
            echo $date;
            echo '<br>';
            echo $price;
        }catch (\PDOException $e){
            throw new \Exception('failed post()');
        }
    }
    public function getResults() {
//        $data = array_fill(0, 3, 0);
        $data = array();
        $sql = "SELECT M.date, E.e_name, M.price FROM main AS M
                INNER JOIN expenses AS E
                ON M.e_id = E.e_id
                ORDER BY M.date ASC ;";
        $i = 0;
        foreach ($this->db->query($sql) as $row) {
            $data[$i]['date'] = date("Y/m/d", strtotime($row['date']));
            $data[$i]['e_name'] = $row['e_name'];
            $data[$i]['price'] = $row['price'];
            $i++;
        }
        return $data;
    }
    public function viewMonth($month){
        $data = array();
        $sql = "SELECT M.date, E.e_name, M.price FROM main AS M
                INNER JOIN expenses AS E
                ON M.e_id = E.e_id 
                WHERE M.date >= ". $month. " AND M.date < ". $month. "+ INTERVAL 1 MONTH
                ORDER BY M.date ASC ";
        $i = 0;
        foreach ($this->db->query($sql) as $row) {
            $data[$i]['date'] = date("Y/m/d", strtotime($row['date']));
            $data[$i]['e_name'] = $row['e_name'];
            $data[$i]['price'] = $row['price'];
            $i++;
        }
        return $data;
    }

    public function createJson($data){
        //jsonとして出力
        header('Content-type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
