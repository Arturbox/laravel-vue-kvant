<?php

namespace App\Services\Storage;

use App\Exceptions\ServiceException;

final readonly class StorageService
{
    public function __construct(private SwitchManager $switchManager, private string $storage)
    {

    }

    /**
     * @throws ServiceException
     */
    public function bid(array $data): bool
    {
        $factory = $this->switchManager->getFactory($this->storage);

        return $factory->createStatement($data);
    }

}



