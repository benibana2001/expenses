<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-24
 * Time: 10:51
 */
class PostExpenses extends PostData
{
    public function __construct()
    {
        parent::__construct();
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
            $this->success();

        } catch (\Exception $e) {
            // TODO: エラー時の処理は、main関数で実行 エラーメッセージを返すのみに留める
            var_dump($e->getMessage());
        }
    }

    private function validate()
    {
        if (
            !isset($_POST['date']) ||
            strlen($_POST['date']) < 4
        ) {
            throw new \Exception('invalid date!');
        }
    }

    private function post()
    {
        // TODO: Validateに記述を分散する SQLを投げる処理とは分離する
        $date = $_POST["date"];
        $price = (int)$_POST["price"];
        if(strlen($date) === 4){
           $date = 2018 . $date;
        };
        //

        $sql = 'INSERT INTO `main` (ID, date, e_id, price) VALUES (null, :date, :e_id, :price);';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':e_id', $_POST["e_id"], \PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, \PDO::PARAM_INT);

        // TODO: 画面書き出しの機能は関数を分離する
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
        //
    }

    private function success()
    {
        // TODO: 登録完了時処理
    }
}
