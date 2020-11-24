<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorConstants as ModuleConstants;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorFactory;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModelInterface;

class GoogleTagManagerCategoryProductNamePluginTest extends Unit
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

        $params = [
            ModuleConstants::PARAM_PRODUCT_ATTRIBUTES => [
                ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED => 'NAME_UNTRANSLATED',
                ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_ABSTRACT_NAME => 'NAME',
            ],
        ];

        $googleTagManagerCategoryProductConnectorModelMock->expects($this->once())
            ->method('getProductName')
            ->willReturn([ModuleConstants::FIELD_PRODUCT_NAME => 'NAME']);

        $googleTagManagerCategoryProductNamePlugin = new GoogleTagManagerCategoryProductNamePlugin();
        $googleTagManagerCategoryProductNamePlugin->setFactory($factoryMock);

        $result = $googleTagManagerCategoryProductNamePlugin->addVariable('pageType', $params);

        $this->assertIsArray($result);
        $this->assertArrayHasKey(ModuleConstants::FIELD_PRODUCT_NAME, $result);
    }
}
