<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorConstants as ModuleConstants;
use Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface;

class GoogleTagManagerCategoryProductConnectorModelTest extends Unit
{
    /**
     * @var \FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModelInterface
     */
    protected $model;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface;
     */
    protected $moneyPluginMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->moneyPluginMock = $this->getMockBuilder(MoneyPluginInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->model = new GoogleTagManagerCategoryProductConnectorModel($this->moneyPluginMock);
    }

    /**
     * @return void
     */
    public function testGetIdProductAbstract(): void
    {
        $result = $this->model->getIdProductAbstract([
            ModuleConstants::PARAM_PRODUCT_ID_ABSTRACT => 'ABSTRACT-ID',
        ]);

        $this->assertArrayHasKey(ModuleConstants::FIELD_PRODUCT_ID_ABSTRACT, $result);
    }

    /**
     * @return void
     */
    public function testGetProductPrice(): void
    {
        $this->moneyPluginMock->expects($this->once())
            ->method('convertIntegerToDecimal')
            ->with(6990)
            ->willReturn(69.00);

        $result = $this->model->getProductPrice([
            ModuleConstants::PARAM_PRODUCT_PRICE => 6990,
        ]);

        $this->assertArrayHasKey(ModuleConstants::FIELD_PRICE, $result);
    }

    /**
     * @return void
     */
    public function testGetProductName(): void
    {
        $result = $this->model->getProductName([
        ModuleConstants::PARAM_PRODUCT_ATTRIBUTES => [
            ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED => 'NAME_UNTRANSLATED',
            ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_ABSTRACT_NAME => 'NAME',
        ]]);

        $this->assertArrayHasKey(ModuleConstants::FIELD_PRODUCT_NAME, $result);
    }

    /**
     * @return void
     */
    public function testGetProductSku(): void
    {
        $result = $this->model->getProductName([
            ModuleConstants::PARAM_PRODUCT_ABSTRACT_SKU => 'ABSTRACT_SKU',
        ]);

        $this->assertArrayHasKey(ModuleConstants::FIELD_SKU, $result);
    }
}
