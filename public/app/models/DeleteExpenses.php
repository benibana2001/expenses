<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-25
 * Time: 16:29
 */
class DeleteExpenses extends DeleteData
{
    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function deleteData()
    {
        $this->delete();
    }

    private function delete()
    {
        try {
            $sql = "DELETE FROM `main` WHERE id = :id";

            $stmt = $this->dbHandler->prepare($sql);

            $stmt->bindValue(':id', $this->id);

            $stmt->execute();

            $this->success();
        }

        catch (Exception $e) {
            $e->getMessage();
        }
    }

    private function success()
    {
        echo "削除に成功しました。\n";
        echo "ID: " . $this->id . "\n";
    }
}
