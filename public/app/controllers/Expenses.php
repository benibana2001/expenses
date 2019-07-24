<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-23
 * Time: 18:29
 */
class Expenses
{
    public function month($id = 0)
    {
        switch ($id){
            case 0:
                $data = $this->getAll();
                break;
            default :
                $data = $this->getEach($id);
                break;
        }

//        $writer = new WriterJSON($data);
        $writer = new WriterHTML($data);

        $writer->write();
    }

    private function getAll()
    {
        $data = new GetAllMonth();
        return $data->getData();
    }

    private function getEach($id)
    {
        $data = new GetEachMonth($id);
        return $data->getData();
    }
}
