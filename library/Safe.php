<?php
include_once("interfaces/SafeInterface.php");
include_once("interfaces/ConnectorInterface.php");
include_once("interfaces/PasswordInterface.php");
//include_once("library/Timer.php");

class Safe implements SafeInterface
{
    protected $count = 10;
    protected $size = 4;
    protected $block_time = 60;
    protected $current_attempts;
    protected $connector;
    private $blocked = false;
    private $timer;
    private $pass;

    public function __construct(ConnectorInterface $connector, PasswordInterface $password)
    {
        $this->connector = $connector;
        $this->pass = $password;
    }

    public function verification($value)
    {
        if(iconv_strlen($value) <= $this->size ) $this->connector->save($value);
        if ($this->pass->getPassword() == $value) return $this->connector->getCount();
        return false;
    }

    public function getStatus()
    {
        return $this->blocked;
    }

    public function reset(){
        $this->current_attempts = 0;
        $this->blocked = false;
        $this->timer->clear();
        $this->timer = null;
    }

    public function setBlocked()
    {
        $this->blocked = true;
        $this->timer = new EvTimer($this->block_time, 0, function() {$this->reset();});
    }

    public function attempts($value){
        if(!$this->blocked) {
            ++$this->current_attempts;
            if($this->current_attempts >= $this->count) $this->setBlocked();
            return $this->verification($value);
        }

        if($this->blocked){
            $t_time = $this->timer->remaining;
            $this->timer->clear();
            $this->timer = new EvTimer($this->block_time + $t_time,0, function(){$this->reset();});
        }

        return false;
    }

    public function getConnector(){ return $this->connector; }
}