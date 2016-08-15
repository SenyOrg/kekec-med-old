<?php

namespace KekecMed\Core\Views\Elements;

/**
 * Class CheckboxSelect
 *
 * General multi select element
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class CheckboxSelect extends MultiSelect
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [
        'trackChanges' => true,
        'emptyOption'  => true,
        'icon'         => null,
        'labelClass'   => 'primary',
        'maxChars'     => 50,
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
        return 'checkboxselect';
    }
}