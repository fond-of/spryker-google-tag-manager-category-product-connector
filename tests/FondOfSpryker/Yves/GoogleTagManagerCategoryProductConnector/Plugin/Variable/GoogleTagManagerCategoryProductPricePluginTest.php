<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorConstants as ModuleConstants;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorFactory;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModelInterface;

class GoogleTagManagerCategoryProductPricePluginTest extends Unit
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

        $params = [ModuleConstants::PARAM_PRODUCT_PRICE => 6666];

        $googleTagManagerCategoryProductConnectorModelMock->expects($this->once())
            ->method('getProductPrice')
            ->willReturn($params);

        $googleTagManagerCategoryProductPricePlugin = new GoogleTagManagerCategoryProductPricePlugin();
        $googleTagManagerCategoryProductPricePlugin->setFactory($factoryMock);

        $result = $googleTagManagerCategoryProductPricePlugin->addVariable('pageType', $params);

        $this->assertIsArray($result);
        $this->assertArrayHasKey(ModuleConstants::FIELD_PRICE, $result);
    }
}
