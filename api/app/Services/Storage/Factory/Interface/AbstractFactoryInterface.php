<?php

namespace App\Services\Storage\Factory\Interface;

interface AbstractFactoryInterface
{

    public function createStatement(array $data): bool;

}
