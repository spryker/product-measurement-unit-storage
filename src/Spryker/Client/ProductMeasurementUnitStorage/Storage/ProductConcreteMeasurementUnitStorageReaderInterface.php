<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductMeasurementUnitStorage\Storage;

use Generated\Shared\Transfer\ProductConcreteMeasurementUnitStorageTransfer;

interface ProductConcreteMeasurementUnitStorageReaderInterface
{
    public function findProductConcreteMeasurementUnitStorage(int $idProduct): ?ProductConcreteMeasurementUnitStorageTransfer;

    /**
     * @param array<int> $productConcreteIds
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteMeasurementUnitStorageTransfer>
     */
    public function getProductConcreteMeasurementUnitStorageCollection(array $productConcreteIds): array;
}
