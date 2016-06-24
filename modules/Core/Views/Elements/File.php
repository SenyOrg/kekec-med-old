<?php

namespace KekecMed\Core\Views\Elements;

use KekecMed\Core\Abstracts\Views\Elements\AbstractGenericInputParameters;

/**
 * Class File
 *
 * General file element
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class File extends AbstractGenericInputParameters
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [
        'trackChanges' => true,
    ];

    /**
     * Attribute
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Handle inputs
     *
     * @param null $viewMode
     */
    protected function handle($viewMode = null)
    {
        $this->defaultHandler();

        $this->parameters['type'] = 'file';
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'file';
    }
}