<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorConstants as ModuleConstants;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorFactory;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModelInterface;

class GoogleTagManagerCategoryProductSkuPluginTest extends Unit
{
    /**
     * @return void
     */
    public function testAddVariable(): void
    {
        $factoryMock = $this->getMockBuilder(GoogleTagManagerCategoryProductConnectorFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $googleTagManagerCategoryProductConnectorModelMock = $this->getMockBuilder(GoogleTagManagerCategoryProductConnectorModelInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $factoryMock->expects($this->once())
            ->method('createGoogleTagManagerCategoryProductConnectorModel')
            ->willReturn($googleTagManagerCategoryProductConnectorModelMock);

        $params = [ModuleConstants::PARAM_PRODUCT_ABSTRACT_SKU => 'ABSTRACT-SKU'];

        $googleTagManagerCategoryProductConnectorModelMock->expects($this->once())
            ->method('getProductSku')
            ->willReturn([ModuleConstants::FIELD_SKU => 'SKU']);

        $googleTagManagerCategoryProductSkuPlugin = new GoogleTagManagerCategoryProductSkuPlugin();
        $googleTagManagerCategoryProductSkuPlugin->setFactory($factoryMock);

        $result = $googleTagManagerCategoryProductSkuPlugin->addVariable('pageType', $params);

        $this->assertIsArray($result);
        $this->assertArrayHasKey(ModuleConstants::FIELD_SKU, $result);
    }
}
