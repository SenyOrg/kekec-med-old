<?php

namespace KekecMed\Core\Abstracts\Views\Elements;

use KekecMed\Core\Arrays\CoreArray;

/**
 * Class AbstractInput
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Views\Elements
 */
abstract class AbstractInput extends AbstractElement
{
    /**
     * Renders ViewMode representation
     *
     * @return string
     */
    protected function renderView()
    {
        /**
         * Render ViewView and set all necessary resources
         */
        return view($this->getViewViewPath(), $this->packVariables());
    }

    /**
     * Get path to ViewView
     *
     * @return string
     */
    protected abstract function getViewViewPath();

    /**
     * Pack Variables for view
     *
     * @return array
     */
    protected function packVariables()
    {
        return [
            'configuration' => CoreArray::factory($this->configuration),
            'parameters'    => CoreArray::factory($this->parameters),
            'attributes'    => CoreArray::factory($this->attributes)
        ];
    }

    /**
     * Renders EditMode representation
     *
     * @return string
     */
    protected function renderEdit()
    {
        /**
         * Render EditView and set all necessary resources
         */
        return view($this->getEditViewPath(), $this->packVariables());
    }

    /**
     * Get path to EditView
     *
     * @return String
     */
    protected abstract function getEditViewPath();
}