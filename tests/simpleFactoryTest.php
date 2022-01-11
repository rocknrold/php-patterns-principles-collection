<?php

namespace Test;

use App\Creational\SimpleFactory\Pizza;
use App\Creational\SimpleFactory\PizzaFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    public function test_factory_can_create_pizza()
    {
        $pizza = (new PizzaFactory)->makePizza();

        $this->assertInstanceOf(Pizza::class, $pizza);
    }

    public function test_factory_pepperoni_pizza()
    {
        $pizza = new Pizza();
        $truePizzaClass = $pizza->order('Pepperoni');

        $pizzaFactory = new PizzaFactory();
        $mockPizzaFactory = $pizzaFactory->makePizza()->order('Pepperoni');

        $this->assertEquals($truePizzaClass,$mockPizzaFactory);
    }
}