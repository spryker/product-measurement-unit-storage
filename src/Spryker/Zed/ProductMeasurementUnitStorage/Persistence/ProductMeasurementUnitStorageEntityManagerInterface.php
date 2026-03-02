<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductMeasurementUnitStorage\Persistence;

use Generated\Shared\Transfer\SpyProductConcreteMeasurementUnitStorageEntityTransfer;
use Generated\Shared\Transfer\SpyProductMeasurementUnitStorageEntityTransfer;

interface ProductMeasurementUnitStorageEntityManagerInterface
{
    public function saveProductMeasurementUnitStorageEntity(SpyProductMeasurementUnitStorageEntityTransfer $productMeasurementUnitStorageEntityTransfer): void;

    public function deleteProductMeasurementUnitStorage(int $idProductMeasurementUnitStorage): void;

    public function saveProductConcreteMeasurementUnitStorageEntity(
        SpyProductConcreteMeasurementUnitStorageEntityTransfer $productConcreteMeasurementUnitStorageEntityTransfer
    ): void;

    public function deleteProductConcreteMeasurementUnitStorage(int $idProductConcreteMeasurementUnitStorage): void;
}
