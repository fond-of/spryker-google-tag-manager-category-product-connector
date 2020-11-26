<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerExtension\Dependency\GoogleTagManagerVariableBuilderPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\GoogleTagManagerCategoryProductConnectorFactory getFactory()
 */
class GoogleTagManagerCategoryProductPricePlugin extends AbstractPlugin implements GoogleTagManagerVariableBuilderPluginInterface
{
    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        return $this->getFactory()
            ->createGoogleTagManagerCategoryProductConnectorModel()
            ->getProductPrice($params);
    }
}
