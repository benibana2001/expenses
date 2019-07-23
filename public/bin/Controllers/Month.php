<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-21
 * Time: 05:44
 */
class Month
{
    public function index()
    {
        echo 'Hello Month index';
        $data = new GetAllMonth();
        $data = $data->getData();

        $writer = new WriterHTML($data);

        $writer->write();

    }
}
