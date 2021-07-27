<?php
include_once("interfaces/SafeInterface.php");
include_once("interfaces/VariantInterfaces.php");

class Processor
{
    private $list;
    private $variant;
    private $max_process;

    public function attempts(){
        $flag = false;
        while(!$flag){
            foreach ($this->list as &$safe){
                while(!$safe->getStatus() && !$flag){
                    $flag = $safe->attempts($this->variant->getVariant());
                    if($flag) break;
                }

                if($flag) return $flag;

                if ($safe == $this->list[count($this->list)-1] && count($this->list) < $this->max_process){
                    $this->list[] = clone $safe;
                    ($this->list[count($this->list)-1])->reset();
                }
            }
        }
        return false;
    }

    public function __construct(SafeInterface $safe, VariantInterfaces $variant, $max_process = 10)
    {
        $this->list[] = $safe;
        $this->variant = $variant;
        if($safe->getConnector()->getCount()) {
            $this->variant->setCurrentValue($safe->getConnector()->lastValue());
        }
        $this->max_process = $max_process;
    }
}