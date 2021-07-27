<?php


interface ConnectorInterface
{
    public function save($value);

    public function getCount();

    public function lastValue();
}