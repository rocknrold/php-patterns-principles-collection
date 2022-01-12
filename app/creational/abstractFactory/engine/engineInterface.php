<?php

namespace App\Creational\AbstractFactory\Engine;

interface EngineInterface
{
    public function engine(int $horsepower, string $gasType);
}