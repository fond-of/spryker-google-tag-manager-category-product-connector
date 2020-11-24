<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model;

interface GoogleTagManagerCategoryProductConnectorModelInterface
{
    /**
     * @param array $params
     *
     * @return array
     */
    public function getIdProductAbstract(array $params): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductPrice(array $params): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductName(array $params): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductSku(array $params): array;
}
