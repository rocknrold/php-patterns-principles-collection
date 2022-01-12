<?php

namespace App\Creational\AbstractFactory;

/**
 *  ABSTRACT FACTORY DESIGN PATTERN
 * 
 * It is a creational design pattern commonly used for factories of factories,
 * abstract factory pattern enables us to encapsulate the creation of related factories. 
 * 
 * Eg: In the carfactory we can build different types of cars just implement the car factory
 * to car classes, in our case the SupraFactory and ViosFactory will create cars. 
 * 
 * And in here the ToyotaFactory has a method that accepts which type of car you want to make
 * then an instance of that car will be made ( the instance is a car interface ).
 * Then after creating that instance you can easily access methods under that car model (eg: the chasis,engine,tires);
 */


class ToyotaFactory
{
    protected array $modelList = [
        'supra' => \App\Creational\AbstractFactory\CarModels\SupraFactory::class,
        'vios' => \App\Creational\AbstractFactory\CarModels\ViosFactory::class
    ];

    public function order(string $model)
    {
        return new $this->modelList[$model];
    }
}