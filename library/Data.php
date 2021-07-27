<?php

include_once("interfaces/DataInterface.php");

class Data extends DataInterface
{
    public function get()
    {
        foreach ($this->data as $key => $value){
            if($_POST[$key]) $this->data[$key] = $_POST[$key];
            //$this->data[$key] = $_REQUEST[$key] || $_POST[$key] || $_GET[$key] || null;
        }
        return $this->data;
    }
}