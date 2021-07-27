<?php
include_once("interfaces/PasswordInterface.php");

class Password extends PasswordInterface
{
    public function __construct($value)
    {
        $this->setPassword($value);
    }
}