<?php

namespace App\Creational\AbstractFactory\CarModels;

use App\Creational\AbstractFactory\Chasis\ChasisInterface;
use App\Creational\AbstractFactory\Engine\EngineInterface;
use App\Creational\AbstractFactory\Tires\TireInterface;

interface CarFactory
{
    public function chasis() : ChasisInterface;
    public function engine() : EngineInterface;
    public function tires() : TireInterface;
}