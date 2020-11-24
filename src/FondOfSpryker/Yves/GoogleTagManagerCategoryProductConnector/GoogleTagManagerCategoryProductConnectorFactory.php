<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector;

use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModel;
use FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModelInterface;
use Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class GoogleTagManagerCategoryProductConnectorFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model\GoogleTagManagerCategoryProductConnectorModel
     */
    public function createGoogleTagManagerCategoryProductConnectorModel(): GoogleTagManagerCategoryProductConnectorModelInterface
    {
        return new GoogleTagManagerCategoryProductConnectorModel(
            $this->getMoneyPlugin()
        );
    }

    /**
     * @return \Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface
     */
    public function getMoneyPlugin(): MoneyPluginInterface
    {
        return $this->getProvidedDependency(GoogleTagManagerCategoryProductConnectorDependencyProvider::PLUGIN_MONEY);
    }
}
