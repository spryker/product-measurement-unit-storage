<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductMeasurementUnitStorage\Expander;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\ProductMeasurementUnitStorage\Storage\ProductMeasurementBaseUnitReaderInterface;

class ProductViewMeasurementUnitExpander implements ProductViewMeasurementUnitExpanderInterface
{
    public function __construct(
        protected ProductMeasurementBaseUnitReaderInterface $productMeasurementBaseUnitReader,
    ) {
    }

    public function expandProductViewWithMeasurementUnit(ProductViewTransfer $productViewTransfer): ProductViewTransfer
    {
        $idProductConcrete = $productViewTransfer->getIdProductConcrete();

        if ($idProductConcrete === null) {
            return $productViewTransfer;
        }

        $productMeasurementUnit = $this->productMeasurementBaseUnitReader
            ->findProductMeasurementBaseUnitByIdProduct($idProductConcrete);

        if ($productMeasurementUnit === null) {
            return $productViewTransfer;
        }

        return $productViewTransfer->setBaseUnit($productMeasurementUnit);
    }
}
