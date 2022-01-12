<?php

namespace App\Creational\AbstractFactory\Chasis;

use App\Creational\AbstractFactory\Chasis;

class SUV implements ChasisInterface
{
    public function body()
    {
        return "SUV Body chasis";
    }
}