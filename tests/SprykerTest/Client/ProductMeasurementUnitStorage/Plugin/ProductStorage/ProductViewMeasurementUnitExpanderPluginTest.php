<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Client\ProductMeasurementUnitStorage\Plugin\ProductStorage;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\ProductConcreteMeasurementBaseUnitTransfer;
use Generated\Shared\Transfer\ProductConcreteMeasurementUnitStorageTransfer;
use Generated\Shared\Transfer\ProductMeasurementUnitStorageTransfer;
use Generated\Shared\Transfer\ProductViewTransfer;
use Generated\Shared\Transfer\StoreTransfer;
use PHPUnit\Framework\MockObject\MockObject;
use Spryker\Client\ProductMeasurementUnitStorage\Dependency\Client\ProductMeasurementUnitStorageToStorageClientInterface;
use Spryker\Client\ProductMeasurementUnitStorage\Dependency\Client\ProductMeasurementUnitStorageToStoreClientInterface;
use Spryker\Client\ProductMeasurementUnitStorage\Plugin\ProductStorage\ProductViewMeasurementUnitExpanderPlugin;
use Spryker\Client\ProductMeasurementUnitStorage\ProductMeasurementUnitStorageDependencyProvider;
use SprykerTest\Client\ProductMeasurementUnitStorage\ProductMeasurementUnitStorageClientTester;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Client
 * @group ProductMeasurementUnitStorage
 * @group Plugin
 * @group ProductStorage
 * @group ProductViewMeasurementUnitExpanderPluginTest
 * Add your own group annotations below this line
 */
class ProductViewMeasurementUnitExpanderPluginTest extends Unit
{
    protected const string STORE_NAME_DE = 'DE';

    protected const int ID_PRODUCT_MEASUREMENT_UNIT = 10;

    protected ProductMeasurementUnitStorageClientTester $tester;

    protected ProductMeasurementUnitStorageToStorageClientInterface|MockObject $storageClientMock;

    protected ProductMeasurementUnitStorageToStoreClientInterface|MockObject $storeClientMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->storageClientMock = $this->createMock(ProductMeasurementUnitStorageToStorageClientInterface::class);
        $this->storeClientMock = $this->createMock(ProductMeasurementUnitStorageToStoreClientInterface::class);

        $storeTransfer = (new StoreTransfer())->setName(static::STORE_NAME_DE);
        $this->storeClientMock->method('getCurrentStore')->willReturn($storeTransfer);

        $this->tester->setDependency(ProductMeasurementUnitStorageDependencyProvider::CLIENT_STORAGE, $this->storageClientMock);
        $this->tester->setDependency(ProductMeasurementUnitStorageDependencyProvider::CLIENT_STORE, $this->storeClientMock);
    }

    /**
     * @dataProvider expandProductViewTransferDataProvider
     */
    public function testGivenProductViewTransferWhenExpandingWithMeasurementUnitThenBaseUnitIsSetCorrectly(
        ProductViewTransfer $productViewTransfer,
        ?array $storageData,
        bool $expectBaseUnitSet,
    ): void {
        // Arrange
        $this->setUpStorageClientMock($storageData);
        $plugin = new ProductViewMeasurementUnitExpanderPlugin();

        // Act
        $result = $plugin->expandProductViewTransfer($productViewTransfer, [], 'en_US');

        // Assert
        if ($expectBaseUnitSet) {
            $this->assertNotNull($result->getBaseUnit());
            $this->assertSame(static::ID_PRODUCT_MEASUREMENT_UNIT, $result->getBaseUnit()->getIdProductMeasurementUnit());
            $this->assertSame('KILO', $result->getBaseUnit()->getCode());

            return;
        }

        $this->assertNull($result->getBaseUnit());
    }

    /**
     * @return array<string, mixed>
     */
    protected function expandProductViewTransferDataProvider(): array
    {
        return [
            'product without concrete ID returns unchanged' => [
                'productViewTransfer' => new ProductViewTransfer(),
                'storageData' => null,
                'expectBaseUnitSet' => false,
            ],
            'product with concrete ID zero returns unchanged' => [
                'productViewTransfer' => (new ProductViewTransfer())->setIdProductConcrete(0),
                'storageData' => null,
                'expectBaseUnitSet' => false,
            ],
            'product with measurement unit sets base unit' => [
                'productViewTransfer' => (new ProductViewTransfer())->setIdProductConcrete(123),
                'storageData' => $this->createMeasurementUnitStorageData(static::ID_PRODUCT_MEASUREMENT_UNIT),
                'expectBaseUnitSet' => true,
            ],
            'product without measurement unit in storage returns unchanged' => [
                'productViewTransfer' => (new ProductViewTransfer())->setIdProductConcrete(456),
                'storageData' => null,
                'expectBaseUnitSet' => false,
            ],
        ];
    }

    protected function setUpStorageClientMock(?array $storageData): void
    {
        if ($storageData === null) {
            $this->storageClientMock->method('get')->willReturn(null);

            return;
        }

        $this->storageClientMock->method('get')->willReturnOnConsecutiveCalls(
            $storageData['productConcreteMeasurementUnit'],
            $storageData['productMeasurementUnit'],
        );
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    protected function createMeasurementUnitStorageData(int $idProductMeasurementUnit): array
    {
        return [
            'productConcreteMeasurementUnit' => (new ProductConcreteMeasurementUnitStorageTransfer())
                ->setBaseUnit(
                    (new ProductConcreteMeasurementBaseUnitTransfer())->setIdProductMeasurementUnit($idProductMeasurementUnit),
                )
                ->toArray(),
            'productMeasurementUnit' => (new ProductMeasurementUnitStorageTransfer())
                ->setIdProductMeasurementUnit($idProductMeasurementUnit)
                ->setName('measurement_units.standard.weight.kilo.name')
                ->setCode('KILO')
                ->toArray(),
        ];
    }
}
