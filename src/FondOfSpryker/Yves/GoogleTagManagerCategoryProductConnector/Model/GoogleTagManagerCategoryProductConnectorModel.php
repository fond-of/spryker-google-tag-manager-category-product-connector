<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model;

use FondOfSpryker\Shared\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorConstants as ModuleConstants;
use Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface;

class GoogleTagManagerCategoryProductConnectorModel implements GoogleTagManagerCategoryProductConnectorModelInterface
{
    protected $moneyPlugin;

    public function __construct(MoneyPluginInterface $moneyPlugin)
    {
        $this->moneyPlugin = $moneyPlugin;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function getIdProductAbstract(array $params): array
    {
        if (!isset($params[ModuleConstants::PARAM_PRODUCT_ID_ABSTRACT])) {
            return [];
        }

        return [
            ModuleConstants::FIELD_PRODUCT_ID_ABSTRACT => $params[ModuleConstants::PARAM_PRODUCT_ID_ABSTRACT],
        ];
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductPrice(array $params): array
    {
        if (!isset($params[ModuleConstants::PARAM_PRODUCT_PRICE])) {
            return [];
        }

        $priceInt = $params[ModuleConstants::PARAM_PRODUCT_PRICE];

        return [
            ModuleConstants::FIELD_PRICE => $this->moneyPlugin
                ->convertIntegerToDecimal($priceInt),
        ];
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductName(array $params): array
    {
        if (!isset($params[ModuleConstants::PARAM_PRODUCT_ATTRIBUTES])) {
            return [];
        }

        $attributes = $params[ModuleConstants::PARAM_PRODUCT_ATTRIBUTES];

        $name = isset($attributes[ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED])
            ? $attributes[ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED]
            : $attributes[ModuleConstants::PARAM_PRODUCT_ATTRIBUTE_ABSTRACT_NAME];

        return [
            ModuleConstants::FIELD_PRODUCT_NAME => $name,
        ];
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductSku(array $params): array
    {
        if (!isset($params[ModuleConstants::PARAM_PRODUCT_ABSTRACT_SKU])) {
            return [];
        }

        $sku = str_replace('ABSTRACT-', '', strtoupper($params[ModuleConstants::PARAM_PRODUCT_ABSTRACT_SKU]));

        return [
            ModuleConstants::FIELD_SKU => $sku,
        ];
    }
}
