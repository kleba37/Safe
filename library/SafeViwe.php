<?php
include_once("interfaces/SafeInterface.php");

class SafeViwe
{
    private $safe;

    public function __construct(SafeInterface $safe)
    {
        $this->safe = $safe;
    }

    public function viwe(){
        print_r("<form method='post'><lable>Введите проверяемое значение</lable><input name='attempts'/><button type='submit' name='submit' value='true'/></form>>");
    }
}