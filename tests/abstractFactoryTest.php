<?php

namespace Test;

use App\Creational\AbstractFactory\CarModels\SupraFactory;
use App\Creational\AbstractFactory\Chasis\Sedan;
use App\Creational\AbstractFactory\ToyotaFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function test_can_create_car()
    {
        $vios = new ToyotaFactory();
        $order = $vios->order('vios');

        $this->assertNotNull($order);
    }

    public function test_can_create_supra()
    {
        $car = new ToyotaFactory();
        $order = $car->order('supra');

        $this->assertInstanceOf(SupraFactory::class, $order);
    }

    public function test_can_get_chasis_for_supra()
    {
        $car = (new ToyotaFactory())->order('supra');

        $chasis = $car->chasis();

        $this->assertInstanceOf(Sedan::class, $chasis);
    }
}