<?php

abstract class DataInterface
{
    protected $data;

    public function get(){}

    public function add($key)
    {
        $this->data[$key] = "";
    }
}