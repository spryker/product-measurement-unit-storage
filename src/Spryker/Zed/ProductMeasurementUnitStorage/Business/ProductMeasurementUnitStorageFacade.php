<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductMeasurementUnitStorage\Business;

use Generated\Shared\Transfer\FilterTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\Business\ProductMeasurementUnitStorageBusinessFactory getFactory()
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\Persistence\ProductMeasurementUnitStorageEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\Persistence\ProductMeasurementUnitStorageRepositoryInterface getRepository()
 */
class ProductMeasurementUnitStorageFacade extends AbstractFacade implements ProductMeasurementUnitStorageFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $productMeasurementUnitIds
     *
     * @return void
     */
    public function publishProductMeasurementUnit(array $productMeasurementUnitIds): void
    {
        $this->getFactory()->createProductMeasurementUnitStorageWriter()->publish($productMeasurementUnitIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $productIds
     *
     * @return void
     */
    public function publishProductConcreteMeasurementUnit(array $productIds): void
    {
        $this->getFactory()->createProductConcreteMeasurementUnitStorageWriter()->publish($productIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementUnitTransfer|\Spryker\Shared\Kernel\Transfer\AbstractEntityTransfer>
     */
    public function findAllProductMeasurementUnitTransfers(): array
    {
        return $this->getFactory()->getProductMeasurementUnitFacade()->findAllProductMeasurementUnitTransfers();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $productMeasurementUnitIds
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementUnitTransfer|\Spryker\Shared\Kernel\Transfer\AbstractEntityTransfer>
     */
    public function findProductMeasurementUnitTransfers(array $productMeasurementUnitIds): array
    {
        return $this->getFactory()->getProductMeasurementUnitFacade()->findProductMeasurementUnitTransfers($productMeasurementUnitIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementSalesUnitTransfer|\Spryker\Shared\Kernel\Transfer\AbstractEntityTransfer>
     */
    public function getSalesUnits(): array
    {
        return $this->getFactory()->getProductMeasurementUnitFacade()->getSalesUnits();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $salesUnitIds
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementSalesUnitTransfer|\Spryker\Shared\Kernel\Transfer\AbstractEntityTransfer>
     */
    public function getSalesUnitsByIds(array $salesUnitIds): array
    {
        return $this->getFactory()->getProductMeasurementUnitFacade()->getSalesUnitsByIds($salesUnitIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FilterTransfer $filterTransfer
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementUnitTransfer|\Spryker\Shared\Kernel\Transfer\AbstractTransfer>
     */
    public function findFilteredProductMeasurementUnitTransfers(FilterTransfer $filterTransfer): array
    {
        return $this->getFactory()->getProductMeasurementUnitFacade()->findFilteredProductMeasurementUnitTransfers($filterTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FilterTransfer $filterTransfer
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementSalesUnitTransfer|\Spryker\Shared\Kernel\Transfer\AbstractTransfer>
     */
    public function findFilteredProductMeasurementSalesUnitTransfers(FilterTransfer $filterTransfer): array
    {
        return $this->getFactory()->getProductMeasurementUnitFacade()->findFilteredProductMeasurementSalesUnitTransfers($filterTransfer);
    }
}
