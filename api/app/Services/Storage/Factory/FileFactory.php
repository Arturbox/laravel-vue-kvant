<?php

namespace App\Services\Storage\Factory;


use App\Services\Storage\Factory\Interface\AbstractFactoryInterface;

class FileFactory implements AbstractFactoryInterface
{

    public function createStatement(array $data): bool
    {
        return true;
    }




}
