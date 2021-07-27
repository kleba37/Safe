<?php


interface SafeInterface
{
    public function attempts($value);
    public function reset();
    public function verification($value);
    public function getStatus();
    public function setBlocked();
}