<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductMeasurementUnitStorage\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\SpyProductMeasurementUnitStorageEntityTransfer;
use Orm\Zed\ProductMeasurementUnitStorage\Persistence\SpyProductMeasurementUnitStorage;

interface ProductMeasurementUnitStorageMapperInterface
{
    public function hydrateSpyProductMeasurementUnitStorageEntity(
        SpyProductMeasurementUnitStorage $spyProductMeasurementUnitStorageEntity,
        SpyProductMeasurementUnitStorageEntityTransfer $productMeasurementUnitStorageEntityTransfer
    ): SpyProductMeasurementUnitStorage;
}
