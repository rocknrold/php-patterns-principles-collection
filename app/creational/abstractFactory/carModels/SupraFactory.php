<?php

namespace App\Creational\AbstractFactory\CarModels;

use App\Creational\AbstractFactory\CarModels\CarFactory;
use App\Creational\AbstractFactory\Chasis\ChasisInterface;
use App\Creational\AbstractFactory\Chasis\Sedan;
use App\Creational\AbstractFactory\Engine\EngineInterface;
use App\Creational\AbstractFactory\Engine\VType;
use App\Creational\AbstractFactory\Tires\Continental;
use App\Creational\AbstractFactory\Tires\TireInterface;

class SupraFactory implements CarFactory
{
    public function engine(): EngineInterface
    {
        return new VType();
    }

    public function chasis(): ChasisInterface
    {
        return new Sedan();
    }

    public function tires(): TireInterface
    {
        return new Continental();
    }
}