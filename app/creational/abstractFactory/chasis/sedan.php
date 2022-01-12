<?php

namespace App\Creational\AbstractFactory\Chasis;

use App\Creational\AbstractFactory\Chasis;

class Sedan implements ChasisInterface
{
    public function body()
    {
        return "Sedan Body chasis";
    }
}