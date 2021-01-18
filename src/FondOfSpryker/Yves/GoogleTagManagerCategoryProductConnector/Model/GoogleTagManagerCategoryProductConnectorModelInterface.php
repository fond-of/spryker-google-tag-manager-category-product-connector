<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductConnector\Model;

interface GoogleTagManagerCategoryProductConnectorModelInterface
{
    /**
     * @param array $params
     *
     * @return array
     */
    public function getIdProductAbstract(string $page, array $twigVariableBag, array $variableList): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductPrice(string $page, array $twigVariableBag, array $variableList): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductName(string $page, array $twigVariableBag, array $variableList): array;

    /**
     * @param array $params
     *
     * @return array
     */
    public function getProductSku(string $page, array $twigVariableBag, array $variableList): array;
}
