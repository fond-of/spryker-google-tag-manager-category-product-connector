<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Plugin\DataLayer;

use FondOfSpryker\Yves\GoogleTagManagerExtension\Dependency\GoogleTagManagerDataLayerExpanderPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorFactory getFactory()
 */
class GoogleTagManagerCategoryProductNamePlugin extends AbstractPlugin implements GoogleTagManagerDataLayerExpanderPluginInterface
{
    public const ALLOWED_PAGE_TYPES = ['category'];

    /**
     * @param string $pageType
     * @param array $twigVariableBag
     *
     * @return bool
     */
    public function isApplicable(string $pageType, array $twigVariableBag = []): bool
    {
        return in_array($pageType, static::ALLOWED_PAGE_TYPES);
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $variableList
     *
     * @return array
     */
    public function expand(string $page, array $twigVariableBag, array $variableList): array
    {
        return $this->getFactory()
            ->createGoogleTagManagerCategoryProductConnectorModel()
            ->getProductName($page, $twigVariableBag, $variableList);
    }
}
