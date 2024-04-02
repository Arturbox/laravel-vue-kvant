<?php

namespace App\Services\Storage;

use App\Exceptions\ServiceException;

final readonly class StorageService
{
    public function __construct(private SwitchManager $switchManager, private string $storageType)
    {

    }

    /**
     * @throws ServiceException
     */
    public function saveFeedback(array $data): bool
    {
        $factory = $this->switchManager->getFactory($this->storageType);

        return $factory->save($data);
    }

}



