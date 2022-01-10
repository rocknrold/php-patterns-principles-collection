<?php

namespace App\Creational\Factory\Plans;

use App\Creational\Factory\Plan;

class Enterprise extends Plan
{
    protected array $features = ['unlimited', '24/7 access', '4GB Ram', '8Cores', 'SSH', 'CRON Jobs', 'SSL Security'];

    public function plan()
    {
        return 'Thank you for availing Enterprise plan';
    }
}