<?php

class SpaceShuttle{
    function powerOn(){
        echo "Power On\n";
    }
    function checkTemp(){
        echo "Temperature OK\n";
    }
    function checkFuel(){
        echo "Fuel check\n";
    }
    function startEngine(){
        echo "Engine Started\n";
    }
    function startThrusters(){
        echo "BYE BYE\n";
    }
}

class SpaceShuttleFacade{
    private $space;
    function __construct(SpaceShuttle $space)
    {
        $this->space = $space;
    }
    function takeOff(){
        $this->space->powerOn();
        $this->space->checkTemp();
        $this->space->checkFuel();
        $this->space->startEngine();
        $this->space->startThrusters();
    }
}

$ss = new SpaceShuttle();
$ssf = new SpaceShuttleFacade($ss);
$ssf->takeOff();