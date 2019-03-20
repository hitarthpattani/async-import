<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\ImportService\Model;

use Magento\ImportService\Api\ImportRestartOperationInterface;

/**
 * Class ImportRestartOperation
 *
 * @package Magento\ImportService\Model
 */
class ImportRestartOperation implements ImportRestartOperationInterface
{
    /**
     * restart failed operation.
     *
     * @param int $uuid
     * @param string $serializedData
     * @return []
     */
    public function execute(int $uuid, string $serializedData)
    {
        return [];
    }
}
