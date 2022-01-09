<?php

namespace Test;

use App\Creational\Singleton\Application;
use PHPUnit\Framework\TestCase;

class Singleton extends TestCase
{
    public function test_class_has_only_one_instance()
    {
        $app = Application::getApplication();
        $app1 = Application::getApplication();
        
        // dd($app,$app1);

        $this->assertTrue(true);
        $this->assertSame($app,$app1);
    }
}