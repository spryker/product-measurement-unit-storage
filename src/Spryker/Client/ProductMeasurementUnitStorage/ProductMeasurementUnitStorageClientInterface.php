<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductMeasurementUnitStorage;

use Generated\Shared\Transfer\ProductConcreteMeasurementUnitStorageTransfer;
use Generated\Shared\Transfer\ProductMeasurementUnitStorageTransfer;
use Generated\Shared\Transfer\ProductMeasurementUnitTransfer;

interface ProductMeasurementUnitStorageClientInterface
{
    /**
     * Specification:
     * - Finds a product measurement unit within Storage with a given ID.
     * - Returns null if product measurement unit was not found.
     *
     * @api
     *
     * @param int $idProductMeasurementUnit
     *
     * @return \Generated\Shared\Transfer\ProductMeasurementUnitStorageTransfer|null
     */
    public function findProductMeasurementUnitStorage(int $idProductMeasurementUnit): ?ProductMeasurementUnitStorageTransfer;

    /**
     * Specification:
     * - Finds a product concrete measurement unit within Storage with a given ID.
     * - Returns null if product concrete measurement unit was not found.
     *
     * @api
     *
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\ProductConcreteMeasurementUnitStorageTransfer|null
     */
    public function findProductConcreteMeasurementUnitStorage(int $idProduct): ?ProductConcreteMeasurementUnitStorageTransfer;

    /**
     * Specification:
     * - Finds a product measurement unit within Storage with a given ID.
     *
     * @api
     *
     * @param int $idProductMeasurementUnit
     *
     * @return \Generated\Shared\Transfer\ProductMeasurementUnitTransfer|null
     */
    public function findProductMeasurementUnit(int $idProductMeasurementUnit): ?ProductMeasurementUnitTransfer;

    /**
     * Specification:
     * - Finds a product sales unit within Storage with a given product ID.
     *
     * @api
     *
     * @param int $idProduct
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementSalesUnitTransfer>|null
     */
    public function findProductMeasurementSalesUnitByIdProduct(int $idProduct): ?array;

    /**
     * Specification:
     * - Finds a product base unit within Storage with a given product ID.
     *
     * @api
     *
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\ProductMeasurementUnitTransfer|null
     */
    public function findProductMeasurementBaseUnitByIdProduct(int $idProduct): ?ProductMeasurementUnitTransfer;

    /**
     * Specification:
     * - Searches for product base units within Storage with given product IDs.
     * - Returns found product base units.
     * - Returned data is indexed by product concrete IDs.
     *
     * @api
     *
     * @param array<int> $productConcreteIds
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementUnitTransfer>
     */
    public function getProductMeasurementBaseUnitsByProductConcreteIds(array $productConcreteIds): array;

    /**
     * Specification:
     * - Searches for product sales units within Storage with given product IDs.
     * - Returns found product sales units.
     *
     * @api
     *
     * @param array<int> $productConcreteIds
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteProductMeasurementSalesUnitTransfer>
     */
    public function getProductMeasurementSalesUnitsByProductConcreteIds(array $productConcreteIds): array;

    /**
     * Specification:
     * - Searches for product measurement unit storage transfers using a given mapping type and identifiers.
     * - Returns found product measurement unit storage transfers.
     *
     * @api
     *
     * @param string $mappingType
     * @param array<string> $identifiers
     *
     * @return array<\Generated\Shared\Transfer\ProductMeasurementUnitTransfer>
     */
    public function getProductMeasurementUnitsByMapping(string $mappingType, array $identifiers): array;

    /**
     * Specification:
     * - Expands array of ProductConcreteTransfers with base measurement unit data using given product ID.
     * - Returns the unchanged provided ProductConcreteTransfers when no base measurement unit is defined for the product.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\ProductConcreteTransfer> $productConcreteTransfers
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteTransfer>
     */
    public function expandProductConcreteTransferWithBaseMeasurementUnit(array $productConcreteTransfers): array;
}
