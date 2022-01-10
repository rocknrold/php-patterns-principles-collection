<?php

namespace Test;

use App\Creational\Singleton\Application;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function test_class_has_only_one_instance()
    {
        $app = Application::getApplication();
        $app1 = Application::getApplication();
        
        $this->assertSame($app,$app1);
    }
}