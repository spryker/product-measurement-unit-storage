<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductMeasurementUnitStorage\Communication\Plugin\Synchronization;

use Generated\Shared\Transfer\SynchronizationDataTransfer;
use Spryker\Shared\ProductMeasurementUnitStorage\ProductMeasurementUnitStorageConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SynchronizationExtension\Dependency\Plugin\SynchronizationDataRepositoryPluginInterface;

/**
 * @deprecated Use {@link \Spryker\Zed\ProductMeasurementUnitStorage\Communication\Plugin\Synchronization\ProductConcreteMeasurementUnitSynchronizationDataBulkPlugin} instead.
 *
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\Persistence\ProductMeasurementUnitStorageRepositoryInterface getRepository()
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\Business\ProductMeasurementUnitStorageFacadeInterface getFacade()
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\Communication\ProductMeasurementUnitStorageCommunicationFactory getFactory()
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\ProductMeasurementUnitStorageConfig getConfig()
 */
class ProductConcreteMeasurementUnitSynchronizationDataPlugin extends AbstractPlugin implements SynchronizationDataRepositoryPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return ProductMeasurementUnitStorageConfig::PRODUCT_CONCRETE_MEASUREMENT_UNIT_RESOURCE_NAME;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return bool
     */
    public function hasStore(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $ids
     *
     * @return array<\Generated\Shared\Transfer\SynchronizationDataTransfer>
     */
    public function getData(array $ids = []): array
    {
        $synchronizationDataTransfers = [];
        $productConcreteMeasurementUnitTransfers = $this->getRepository()->findProductConcreteMeasurementUnitStorageEntities($ids);

        if ($ids === []) {
            $productConcreteMeasurementUnitTransfers = $this->getRepository()->findAllProductConcreteMeasurementUnitStorageEntities();
        }

        foreach ($productConcreteMeasurementUnitTransfers as $productConcreteMeasurementUnitTransfer) {
            $synchronizationDataTransfer = new SynchronizationDataTransfer();
            $synchronizationDataTransfer->setData($productConcreteMeasurementUnitTransfer->getData());
            $synchronizationDataTransfer->setKey($productConcreteMeasurementUnitTransfer->getKey());
            $synchronizationDataTransfer->setStore($productConcreteMeasurementUnitTransfer->getStore());
            $synchronizationDataTransfers[] = $synchronizationDataTransfer;
        }

        return $synchronizationDataTransfers;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array
     */
    public function getParams(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getQueueName(): string
    {
        return ProductMeasurementUnitStorageConfig::PRODUCT_MEASUREMENT_UNIT_SYNC_STORAGE_QUEUE;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string|null
     */
    public function getSynchronizationQueuePoolName(): ?string
    {
        return $this->getFactory()->getConfig()->getProductConcreteMeasurementUnitSynchronizationPoolName();
    }
}
