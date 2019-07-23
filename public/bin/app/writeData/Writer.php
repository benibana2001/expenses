<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 15:22
 */
abstract class Writer
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    abstract protected function write();
}
