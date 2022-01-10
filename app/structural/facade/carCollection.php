<?php 

namespace App\Structural\Facade;

use Exception;

class CarCollection
{
    protected array $cars = ['Sedan','MPV','Hatch Back','SUV','VAN'];
    protected string $carType;

    public function __construct($cartype)
    {
        $this->carType = $cartype;
    }

    public function getCar()
    {
        $selected = null;

        for ($i=0; $i < count($this->cars); $i++) { 
            if(strtolower($this->carType) === strtolower($this->cars[$i]))
            {
                $selected = $this->cars[$i];          
            } 
        }

        if ($selected === null) throw new Exception('No car type found');

        return $selected;
    }

    public function getCarType()
    {
        return $this->carType;
    }
}