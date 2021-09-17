<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductMeasurementUnitStorage;

use Generated\Shared\Transfer\ProductConcreteMeasurementUnitStorageTransfer;
use Generated\Shared\Transfer\ProductMeasurementUnitStorageTransfer;
use Generated\Shared\Transfer\ProductMeasurementUnitTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Spryker\Client\ProductMeasurementUnitStorage\ProductMeasurementUnitStorageFactory getFactory()
 */
class ProductMeasurementUnitStorageClient extends AbstractClient implements ProductMeasurementUnitStorageClientInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idProductMeasurementUnit
     *
     * @return \Generated\Shared\Transfer\ProductMeasurementUnitStorageTransfer|null
     */
    public function findProductMeasurementUnitStorage(int $idProductMeasurementUnit): ?ProductMeasurementUnitStorageTransfer
    {
        return $this->getFactory()
            ->createProductMeasurementUnitStorageReader()
            ->findProductMeasurementUnitStorage($idProductMeasurementUnit);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\ProductConcreteMeasurementUnitStorageTransfer|null
     */
    public function findProductConcreteMeasurementUnitStorage(int $idProduct): ?ProductConcreteMeasurementUnitStorageTransfer
    {
        return $this->getFactory()
            ->createProductConcreteMeasurementUnitStorageReader()
            ->findProductConcreteMeasurementUnitStorage($idProduct);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idProductMeasurementUnit
     *
     * @return \Generated\Shared\Transfer\ProductMeasurementUnitTransfer|null
     */
    public function findProductMeasurementUnit(int $idProductMeasurementUnit): ?ProductMeasurementUnitTransfer
    {
        return $this->getFactory()
            ->createProductMeasurementUnitReader()
            ->findProductMeasurementUnit($idProductMeasurementUnit);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idProduct
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementSalesUnitTransfer>|null
     */
    public function findProductMeasurementSalesUnitByIdProduct(int $idProduct): ?array
    {
        return $this->getFactory()
            ->createProductMeasurementSalesUnitReader()
            ->findProductMeasurementSalesUnitByIdProduct($idProduct);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\ProductMeasurementUnitTransfer|null
     */
    public function findProductMeasurementBaseUnitByIdProduct(int $idProduct): ?ProductMeasurementUnitTransfer
    {
        return $this->getFactory()
            ->createProductMeasurementBaseUnitReader()
            ->findProductMeasurementBaseUnitByIdProduct($idProduct);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $productConcreteIds
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementUnitTransfer>
     */
    public function getProductMeasurementBaseUnitsByProductConcreteIds(array $productConcreteIds): array
    {
        return $this->getFactory()
            ->createProductMeasurementBaseUnitReader()
            ->getProductMeasurementBaseUnitsByProductConcreteIds($productConcreteIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $productConcreteIds
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteProductMeasurementSalesUnitTransfer>
     */
    public function getProductMeasurementSalesUnitsByProductConcreteIds(array $productConcreteIds): array
    {
        return $this->getFactory()
            ->createProductMeasurementSalesUnitReader()
            ->getProductMeasurementSalesUnitsByProductConcreteIds($productConcreteIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $mappingType
     * @param array<string> $identifiers
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementUnitTransfer>
     */
    public function getProductMeasurementUnitsByMapping(string $mappingType, array $identifiers): array
    {
        return $this->getFactory()
            ->createProductMeasurementUnitReader()
            ->getProductMeasurementUnitsByMapping($mappingType, $identifiers);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\ProductConcreteTransfer> $productConcreteTransfers
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteTransfer>
     */
    public function expandProductConcreteTransferWithBaseMeasurementUnit(array $productConcreteTransfers): array
    {
        return $this->getFactory()
            ->createProductMeasurementBaseUnitReader()
            ->expandProductConcreteTransferWithBaseMeasurementUnit($productConcreteTransfers);
    }
}
