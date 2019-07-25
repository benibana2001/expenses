<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-23
 * Time: 18:29
 */
class Expenses
{
    private $method = 'GET';

    public function __construct()
    {
        $req = new Request();

        if ($req->isPost() === true) {
            $this->method = 'POST';
        }
    }

    public function month($id = 0)
    {
        switch ($this->method){
            case "GET" :
                $this->get($id);
                break;

            case "POST" :
                $this->post();
                break;

            default :
                break;
        }
    }

    private function get($id = 0)
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
    private function post()
    {
        $postHandler = new PostExpenses();

        $postHandler->postData();
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
