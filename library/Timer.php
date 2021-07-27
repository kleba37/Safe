<?php


class Timer
{
    protected $now;
    protected $timer;

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['timer'])){
           $this->start();
        }
        $this->now = time();
        return $this->timer = $_SESSION['timer'];
    }

    public function start(){
        $_SESSION['timer'] = time();
        return $this->timer;
    }

    public function stop(){
        session_abort();
    }

    public function get(){
        return $this->now - $this->timer;
    }
}