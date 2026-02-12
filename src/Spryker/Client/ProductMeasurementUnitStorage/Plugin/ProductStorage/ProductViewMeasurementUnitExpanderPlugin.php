<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductMeasurementUnitStorage\Plugin\ProductStorage;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductStorageExtension\Dependency\Plugin\ProductViewExpanderPluginInterface;

/**
 * @method \Spryker\Client\ProductMeasurementUnitStorage\ProductMeasurementUnitStorageFactory getFactory()
 */
class ProductViewMeasurementUnitExpanderPlugin extends AbstractPlugin implements ProductViewExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     * - Expands `ProductViewTransfer` with base measurement unit from storage.
     * - Returns unchanged `ProductViewTransfer` if product concrete ID is not set or measurement unit is not found.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param array<string, mixed> $productData
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer, array $productData, $localeName): ProductViewTransfer
    {
        return $this->getFactory()
            ->createProductViewMeasurementUnitExpander()
            ->expandProductViewWithMeasurementUnit($productViewTransfer);
    }
}
