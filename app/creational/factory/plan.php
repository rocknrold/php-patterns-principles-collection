<?php

namespace App\Creational\Factory;

// Abstract class that will be used on every type/category of concrete classes
abstract class Plan
{
    protected array $features = [];

    abstract public function plan();

    public function getFeatures() : array
    {
        return $this->features;
    }
}