<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductMeasurementUnitStorage\Persistence;

use Generated\Shared\Transfer\SpyProductConcreteMeasurementUnitStorageEntityTransfer;
use Generated\Shared\Transfer\SpyProductMeasurementUnitStorageEntityTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\Persistence\ProductMeasurementUnitStoragePersistenceFactory getFactory()
 */
class ProductMeasurementUnitStorageEntityManager extends AbstractEntityManager implements ProductMeasurementUnitStorageEntityManagerInterface
{
    public function saveProductMeasurementUnitStorageEntity(SpyProductMeasurementUnitStorageEntityTransfer $productMeasurementUnitStorageEntityTransfer): void
    {
        $productMeasurementUnitStorageEntityTransfer->requireFkProductMeasurementUnit();

        $spyProductMeasurementUnitStorageEntity = $this->getFactory()
            ->createProductMeasurementUnitStorageQuery()
            ->filterByFkProductMeasurementUnit($productMeasurementUnitStorageEntityTransfer->getFkProductMeasurementUnit())
            ->findOneOrCreate();

        $this->getFactory()
            ->createProductMeasurementUnitStorageMapper()
            ->hydrateSpyProductMeasurementUnitStorageEntity($spyProductMeasurementUnitStorageEntity, $productMeasurementUnitStorageEntityTransfer)
            ->save();
    }

    public function deleteProductMeasurementUnitStorage(int $idProductMeasurementUnitStorage): void
    {
        $spyProductMeasurementUnitStorageEntity = $this->getFactory()
            ->createProductMeasurementUnitStorageQuery()
            ->filterByIdProductMeasurementUnitStorage($idProductMeasurementUnitStorage)
            ->findOne();

        $spyProductMeasurementUnitStorageEntity->delete();
    }

    public function saveProductConcreteMeasurementUnitStorageEntity(
        SpyProductConcreteMeasurementUnitStorageEntityTransfer $productConcreteMeasurementUnitStorageEntityTransfer
    ): void {
        $productConcreteMeasurementUnitStorageEntityTransfer->requireFkProduct();

        $spyProductConcreteMeasurementUnitStorageEntity = $this->getFactory()
            ->createProductConcreteMeasurementUnitStorageQuery()
            ->filterByFkProduct($productConcreteMeasurementUnitStorageEntityTransfer->getFkProduct())
            ->filterByStore($productConcreteMeasurementUnitStorageEntityTransfer->getStore())
            ->findOneOrCreate();

        $this->getFactory()
            ->createProductConcreteMeasurementUnitStorageMapper()
            ->hydrateSpyProductMeasurementUnitStorageEntity(
                $spyProductConcreteMeasurementUnitStorageEntity,
                $productConcreteMeasurementUnitStorageEntityTransfer,
            )
            ->save();
    }

    public function deleteProductConcreteMeasurementUnitStorage(int $idProductConcreteMeasurementUnitStorage): void
    {
        $spyProductConcreteMeasurementUnitStorageEntity = $this->getFactory()
            ->createProductConcreteMeasurementUnitStorageQuery()
            ->filterByIdProductConcreteMeasurementUnitStorage($idProductConcreteMeasurementUnitStorage)
            ->findOne();

        $spyProductConcreteMeasurementUnitStorageEntity->delete();
    }
}
