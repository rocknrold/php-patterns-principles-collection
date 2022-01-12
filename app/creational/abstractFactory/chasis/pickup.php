<?php 

namespace App\Creational\AbstractFactory\Chasis;

use App\Creational\AbstractFactory\Chasis;

class Pickup implements ChasisInterface
{
    public function body()
    {
        return "Pickup Body chasis";
    }
}