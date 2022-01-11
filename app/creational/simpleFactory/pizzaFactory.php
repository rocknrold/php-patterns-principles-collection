<?php

namespace App\Creational\SimpleFactory;

use App\Creational\SimpleFactory\Pizza;

class PizzaFactory
{
    public function makePizza() : Pizza
    {
        return new Pizza();
    }   
}