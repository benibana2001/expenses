<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 15:48
 */
class WriterJson extends Writer
{
    public function write()
    {
        $this->writeJson();
    }

    private function writeJson()
    {
        echo json_encode($this->data, JSON_UNESCAPED_UNICODE);
    }
}
