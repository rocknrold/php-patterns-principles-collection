<?php

namespace Test;

use App\Creational\Factory\PlanFactory;
use App\Creational\Factory\Plans\Enterprise;
use App\Creational\Factory\Plans\Free;
use App\Creational\Factory\Plans\Pro;
use Exception;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function test_factory_can_create_free_as_default_plan()
    {
        $plan = new PlanFactory();

        $free =$plan->create();

        $this->assertInstanceOf(Free::class, $free);
    }

    public function test_factory_can_create_free_plan()
    {
        $plan = new PlanFactory();
        
        $free = $plan->create('free');

        $this->assertInstanceOf(Free::class, $free);
    }

    public function test_factory_can_create_pro_plan()
    {
        $plan = new PlanFactory();

        $pro = $plan->create('pro');

        $this->assertInstanceOf(Pro::class, $pro);
    }

    public function test_factory_can_create_enterprise_plan()
    {
        $plan = new PlanFactory();

        $ent = $plan->create('enterprise');

        $this->assertInstanceOf(Enterprise::class, $ent);
    }

    public function test_factory_class_not_found()
    {
        $this->expectException(Exception::class);

        $plan = new PlanFactory();
        $plan->create('premium');
    }
}