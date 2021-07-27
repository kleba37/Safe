<?php


abstract class VariantInterfaces
{
    protected $current_value;
    abstract public function getVariant();
    public function getCurrentValue()
    {
        return $this->current_value;
    }

    public function setCurrentValue($current_value)
    {
        $this->current_value = $current_value;
    }
}