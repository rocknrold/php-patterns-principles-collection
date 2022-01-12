<?php

namespace App\Creational\AbstractFactory\Engine;

use App\Creational\AbstractFactory\Engine\EngineInterface;

class VType implements EngineInterface
{
    public function engine(int $horsepower, string $gasType)
    {
        return "Engine: {$horsepower}hp using {$gasType} gas";
    }
}