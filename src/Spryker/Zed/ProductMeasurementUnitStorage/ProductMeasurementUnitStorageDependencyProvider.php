<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductMeasurementUnitStorage;

use Orm\Zed\ProductMeasurementUnit\Persistence\SpyProductMeasurementSalesUnitQuery;
use Orm\Zed\ProductMeasurementUnit\Persistence\SpyProductMeasurementUnitQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductMeasurementUnitStorage\Dependency\Facade\ProductMeasurementUnitStorageToEventBehaviorFacadeBridge;
use Spryker\Zed\ProductMeasurementUnitStorage\Dependency\Facade\ProductMeasurementUnitStorageToProductMeasurementUnitFacadeBridge;

/**
 * @method \Spryker\Zed\ProductMeasurementUnitStorage\ProductMeasurementUnitStorageConfig getConfig()
 */
class ProductMeasurementUnitStorageDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_EVENT_BEHAVIOR = 'FACADE_EVENT_BEHAVIOR';

    /**
     * @var string
     */
    public const FACADE_PRODUCT_MEASUREMENT_UNIT = 'FACADE_PRODUCT_MEASUREMENT_UNIT';

    /**
     * @var string
     */
    public const REPOSITORY_PRODUCT_MEASUREMENT_UNIT = 'REPOSITORY_PRODUCT_MEASUREMENT_UNIT';

    /**
     * @var string
     */
    public const PROPEL_QUERY_PRODUCT_MEASUREMENT_SALES_UNIT = 'PROPEL_QUERY_PRODUCT_MEASUREMENT_SALES_UNIT';

    /**
     * @var string
     */
    public const PROPEL_QUERY_PRODUCT_MEASUREMENT_UNIT = 'PROPEL_QUERY_PRODUCT_MEASUREMENT_UNIT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addProductMeasurementUnitFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addEventBehaviorFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addEventBehaviorFacade(Container $container): Container
    {
        $container->set(static::FACADE_EVENT_BEHAVIOR, function (Container $container) {
            return new ProductMeasurementUnitStorageToEventBehaviorFacadeBridge(
                $container->getLocator()->eventBehavior()->facade(),
            );
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductMeasurementUnitFacade(Container $container): Container
    {
        $container->set(static::FACADE_PRODUCT_MEASUREMENT_UNIT, function (Container $container) {
            return new ProductMeasurementUnitStorageToProductMeasurementUnitFacadeBridge(
                $container->getLocator()->productMeasurementUnit()->facade(),
            );
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $container->set(static::PROPEL_QUERY_PRODUCT_MEASUREMENT_SALES_UNIT, $container->factory(function () {
            return SpyProductMeasurementSalesUnitQuery::create();
        }));

        $container->set(static::PROPEL_QUERY_PRODUCT_MEASUREMENT_UNIT, $container->factory(function () {
            return SpyProductMeasurementUnitQuery::create();
        }));

        return $container;
    }
}
