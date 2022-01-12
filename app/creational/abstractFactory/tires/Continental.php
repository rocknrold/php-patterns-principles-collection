<?php 

namespace App\Creational\AbstractFactory\Tires;

use App\Creational\AbstractFactory\Tires\TireInterface;

class Continental implements TireInterface
{
    public function wheel(int $size, int $thickness)
    {
        return "Wheel: {$size} with {$thickness}mm";
    }
}