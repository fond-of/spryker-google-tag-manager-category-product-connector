<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model;

use FondOfSpryker\Shared\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorConstants as ModuleConstants;
use Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface;

class GoogleTagManagerCategoryProductConnectorModel implements GoogleTagManagerCategoryProductConnectorModelInterface
{
    /**
     * @var \Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface
     */
    protected $moneyPlugin;

    /**
     * @param \Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface
     */
    public function __construct(MoneyPluginInterface $moneyPlugin)
    {
        $this->moneyPlugin = $moneyPlugin;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $variableList
     *
     * @return array
     */
    public function getIdProductAbstract(string $page, array $twigVariableBag, array $variableList): array
    {
        if (!isset($twigVariableBag[ModuleConstants::PARAM_PRODUCT_ID_ABSTRACT])) {
            return $variableList;
        }

        $variableList[ModuleConstants::FIELD_PRODUCT_ID_ABSTRACT] = $twigVariableBag[ModuleConstants::PARAM_PRODUCT_ID_ABSTRACT];

        return $variableList;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $variableList
     *
     * @return array
     */
    public function getProductPrice(string $page, array $twigVariableBag, array $variableList): array
    {
        if (!isset($twigVariableBag[ModuleConstants::PARAM_PRODUCT_PRICE])) {
            return $variableList;
        }

        $priceInt = $twigVariableBag[ModuleConstants::PARAM_PRODUCT_PRICE];
        $variableList[ModuleConstants::FIELD_PRICE] = $this->moneyPlugin->convertIntegerToDecimal($priceInt);

        return $variableList;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $variableList
     *
     * @return array
     */
    public function getProductName(string $page, array $twigVariableBag, array $variableList): array
    {
        if (!isset($twigVariableBag[ModuleConstants::PARAM_PRODUCT_ATTRIBUTES])) {
            return $variableList;
        }

        $attributes = $twigVariableBag[ModuleConstants::PARAM_PRODUCT_ATTRIBUTES];

        $name = isset($attributes[ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED])
            ? $attributes[ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED]
            : $attributes[ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_ABSTRACT_NAME];

        $variableList[ModuleConstants::FIELD_PRODUCT_NAME] = $name;

        return $variableList;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $variableList
     *
     * @return array
     */
    public function getProductSku(string $page, array $twigVariableBag, array $variableList): array
    {
        if (!isset($twigVariableBag[ModuleConstants::PARAM_PRODUCT_ABSTRACT_SKU])) {
            return $variableList;
        }

        $sku = str_replace('ABSTRACT-', '', strtoupper($twigVariableBag[ModuleConstants::PARAM_PRODUCT_ABSTRACT_SKU]));

        $variableList[ModuleConstants::FIELD_SKU] = $sku;

        return $variableList;
    }
}
