<?php

namespace App\Services\Storage\Factory\Interface;

interface AbstractFactoryInterface
{

    public function save(array $data): bool;

}
