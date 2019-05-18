<?php
class Bike{
    function callMe(){
        echo "hello Bike\n";
    }
}
class Truck{
    function callMe(){
        echo "hello truck\n";
    }
}
abstract class VFactory{
    abstract function create();
}
class BikeFactory extends VFactory{
    function create(){
        return new Bike();
    }
}
class TruckFactory extends VFactory{
    function create(){
        return new Truck();
    }
}

class MainFactory{
    function createFactory($type = 'bike'){
        if('bike' == $type){
            return new BikeFactory();
        }elseif('truck' == $type){
            return new TruckFactory();
        }
    }
}

$obj = new MainFactory();
$fac = $obj->createFactory('bike');
$bike = $fac->create();
$bike->callMe();

$fac = $obj->createFactory('truck');
$truck = $fac->create();
$truck->callMe();
