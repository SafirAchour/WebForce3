<?php

abstract class vehicule{
    protected $fuel;
    private $maxspeed;
    
    protected static $availableFuel =[
        "essence",
        "diesel"
    ];
    
    public function __construct(
        $maxspeed,
        $fuel = 'essence'
    ){
        $this->setFuel($fuel);
        $this->setMaxSpeed($maxspeed);   
    }
    
    public function getFuel(){
        return $this->fuel;
    }
    
    public function getMaxSpeed(){
        echo $this->maxspeed;
    }
    
    public function setFuel($fuel) {
        if (!in_array($fuel, static::$available)){
            $msg = "$fuel n'est pas un carburant acceptez"
                . implode (",", static::$availableFuel)
                . "sont les valeurs possibles";
            
            trigger_error($msg,E_USER_ERROR);
        }
        $this->fuel=$fuel;
        return $this;
    }
    
}

