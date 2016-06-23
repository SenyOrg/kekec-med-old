<?php

namespace KekecMed\Core\Views\Elements;

/**
 * Class Password
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class Password extends Text
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [

    ];

    /**
     * Parameters
     *
     * @var array
     */
    protected $parameters = [
        'value'       => '',
        'placeholder' => '',
    ];

    /**
     * Attribute
     *
     * @var array
     */
    protected $attributes = [
        'onchange' => '',
    ];

    /**
     * Handle inputs make some
     *
     * @param null $viewMode
     */
    protected function handle($viewMode = null)
    {
        // TODO: Implement handle() method.
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'password';
    }
}