<?php

namespace App\Creational\SimpleFactory;

class Pizza 
{
    public function order(string $flavor = "Cheese")
    {
        return 'Order pizza '.$flavor;
    }
}