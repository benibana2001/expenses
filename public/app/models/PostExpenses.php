<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-24
 * Time: 10:51
 */
class PostExpenses extends PostData
{
    private $param;

    public function __construct()
    {
        parent::__construct();

        $req = new Request();

        $this->param = array(
            "date" => $req->getPost("date"),
            "e_id" => $req->getPost("e_id"),
            "price" => (int)$req->getPost("price")
        );
    }

    public function postData()
    {
        $this->register();
    }

    private function register()
    {
        try {
            $this->validate();
            $this->post();

        } catch (Exception $e) {

            echo $e->getMessage();

        }
    }

    private function validate()
    {
        if (!isset($this->param["date"])) throw new Exception('Post Param "date" is null.');

        if (strlen($this->param["date"]) < 4) throw new Exception('Post Param "date" is invalid.');

        if (strlen($this->param["date"]) === 4) $this->param["date"] = date('Y') . $this->param["date"];
    }

    private function post()
    {
        try {
            $sql = 'INSERT INTO `main` (ID, date, e_id, price) VALUES (null, :date, :e_id, :price);';

            $stmt = $this->dbHandler->prepare($sql);

            $stmt->bindValue(':date', $this->param["date"]);
            $stmt->bindValue(':e_id', $this->param["e_id"], \PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->param["price"], \PDO::PARAM_INT);

            $stmt->execute();

            $this->success();
        }

        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function success()
    {
        echo "登録に成功しました。\n";
        echo "登録内容: \n";
        echo "日時: " . $this->param["date"] . ", 費目: " . $this->param["e_id"] . ", 金額: " . $this->param["price"] . "\n";
    }
}
