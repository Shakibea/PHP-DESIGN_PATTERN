<?php
$cars = array(
    'nissan' => [
        'sunny' => [
            'make' => 2004,
            'model' => 'Nissan Sunny B14',
            'displacement' => '150cc',
            'feature' => 'Nice Look',
            'price' => 'xyz'
        ],
        'sunny-ex' => [
            'make' => 2005,
            'model' => 'Nissan Sunny ex saloon',
            'displacement' => '160cc',
            'feature' => 'Nice Look',
            'price' => 'xyz'
        ]
    ],

    'Toyota' => [
        'Axio' => [
            'make' => 2005,
            'model' => 'Nissan Sunny ex saloon',
            'price' => '28 lac',
            'displacement' => '150cc',
            'feature' => 'look nice',
        ],
        'fielder' => [
            'make' => 2005,
            'model' => 'Nissan Sunny ex saloon',
            'price' => '20 lac',
            'displacement' => '150cc',
            'feature' => 'look nice',
        ]
    ]
);

class Car{
    private $make, $model, $price, $displacement, $feature;
    function __construct($carData)
    {
        $this->make = $carData['make'];
        $this->model = $carData['model'];
        $this->price = $carData['price'];
        $this->displacement = $carData['displacement'];
        $this->feature = $carData['feature'];
    }

    function __call($method, $args = null){
        $data = str_replace('get','',strtolower($method));
        if(isset($this->{$data})){
            //$this->displacement 
            return $this->{$data}."\n";
        }else{
            return '';
        }
    }
}

class CarFactory{
    private $data;
    function __construct($data)
    {
        $this->data = $data;
    }
    function getNissanSunny(){
        $data = $this->data['nissan']['sunny'];
        return new Car($data);
    }
}

// $car = new Car($cars['nissan']['sunny']);
// echo $car->getDisplacement();

$carf = new CarFactory($cars);
$nissanSunny = $carf->getNissanSunny();
echo $nissanSunny->getDisplacement();
echo $nissanSunny->getPrice();