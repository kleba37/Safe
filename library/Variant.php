<?php
include_once("interfaces/VariantInterfaces.php");

class Variant extends VariantInterfaces
{
    public function getVariant()
    {
        return $this->current_value++;
    }

    public function __construct()
    {
        $this->current_value = 0;
    }
}