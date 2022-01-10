<?php

namespace App\Creational\Factory\Plans;

use App\Creational\Factory\Plan;

class Pro extends Plan
{
    protected array $features = ['unlimited', '24/7 access', '2GB Ram', '4Cores', 'SSH', 'CRON Jobs'];

    public function plan()
    {
        return 'Thank you for availing Pro plan';
    }
}