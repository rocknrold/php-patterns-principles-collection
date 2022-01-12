<?php

namespace App\Creational\AbstractFactory\Tires;


interface TireInterface
{
    public function wheel(int $size, int $thickness);
}