<?php

namespace App\Services\Storage;


use App\Exceptions\ServiceException;
use App\Services\Storage\Factory\Interface\AbstractFactoryInterface;
use App\Services\Storage\Factory\MysqlFactory;
use App\Services\Storage\Factory\FileFactory;

class SwitchManager
{
    private const string MY_SQL = 'mysql';

    private const string XML = 'xml';


    /**
     * @throws ServiceException
     */
    public function getFactory(string $type): AbstractFactoryInterface
    {
        return match ($type) {
            self::MY_SQL => new MysqlFactory(),
            self::XML => new FileFactory(),
            default => throw new ServiceException("Factory method not found: {$type}"),
        };
    }


}
