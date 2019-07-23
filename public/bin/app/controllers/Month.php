<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-21
 * Time: 05:44
 */
class Month
{
    public function index($id = 0)
    {
        switch ($id){
            case 0:
                $data = $this->getAll();
                break;
            default :
                echo '$id';
                $data = $this->getEach($id);
                break;
        }

//        $writer = new WriterHTML($data);
        $writer = new WriterJson($data);

        $writer->write();
    }

    public function getEach($id)
    {
        $data = new GetEachMonth($id);
        return $data->getData();
    }

    public function getAll()
    {
        $data = new GetAllMonth();
        return $data->getData();
    }

}
