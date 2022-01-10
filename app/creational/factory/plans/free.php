<?php

namespace App\Creational\Factory\Plans;

use App\Creational\Factory\Plan;


// Class that extends/implements the abstracted method common for every type
// Eg: plan and features;
// Concrete class can be easily extended
class Free extends Plan
{
    protected array $features = ['unlimited', '24/7 access', '1GB Ram', '2Cores'];

    public function plan()
    {
        return 'Thank you for availing Free plan';
    }
}