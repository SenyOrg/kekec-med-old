<?php

namespace KekecMed\Core\Views\Elements;

/**
 * Class Date
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class Date extends Text
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [

    ];

    /**
     * Attribute
     *
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Handle inputs make some
     *
     * @param null $viewMode
     */
    protected function handle($viewMode = null)
    {
        parent::handle($viewMode);
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'date';
    }
}