<?php 

namespace App\Creational\AbstractFactory\CarModels;

use App\Creational\AbstractFactory\Chasis\ChasisInterface;
use App\Creational\AbstractFactory\Chasis\Sedan;
use App\Creational\AbstractFactory\Engine\EngineInterface;
use App\Creational\AbstractFactory\Engine\InlineType;
use App\Creational\AbstractFactory\Tires\TireInterface;
use App\Creational\AbstractFactory\Tires\Yokohama;

class ViosFactory implements CarFactory
{
    public function engine(): EngineInterface
    {
        return new InlineType();
    }

    public function chasis(): ChasisInterface
    {
        return new Sedan();
    }

    public function tires(): TireInterface
    {
        return new Yokohama();
    }
}