<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-21
 * Time: 05:44
 */
class Month
{
    public function html($id = 0)
    {
        switch ($id){
            case 0:
                $data = $this->getAll();
                break;
            default :
                $data = $this->getEach($id);
                break;
        }

        $writer = new WriterHTML($data);

        $writer->write();
    }

    public function json($id = 0)
    {
        switch ($id){
            case 0:
                $data = $this->getAll();
                break;
            default :
                $data = $this->getEach($id);
                break;
        }

        $writer = new WriterJson($data);

        $writer->write();
    }

    private function getEach($id)
    {
        $data = new GetEachMonth($id);
        return $data->getData();
    }

    private function getAll()
    {
        $data = new GetAllMonth();
        return $data->getData();
    }

}
