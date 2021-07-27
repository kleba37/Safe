<?php


abstract class PasswordInterface
{
    private $password;

    public function getPassword()
    {
        return $this->password;
    }
    function setPassword($value){
        $this->password = $value;
    }
}