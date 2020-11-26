<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorConstants as ModuleConstants;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorFactory;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModelInterface;

class GoogleTagManagerCategoryProductIdAbstractPluginTest extends Unit
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

        $params = [ModuleConstants::FIELD_PRODUCT_ID_ABSTRACT => 666];

        $googleTagManagerCategoryProductConnectorModelMock->expects($this->once())
            ->method('getIdProductAbstract')
            ->willReturn($params);

        $googleTagManagerCategoryProductIdAbstractPlugin = new GoogleTagManagerCategoryProductIdAbstractPlugin();
        $googleTagManagerCategoryProductIdAbstractPlugin->setFactory($factoryMock);

        $result = $googleTagManagerCategoryProductIdAbstractPlugin->addVariable('pageType', $params);

        $this->assertIsArray($result);
        $this->assertArrayHasKey(ModuleConstants::FIELD_PRODUCT_ID_ABSTRACT, $result);
    }
}
