<?php

namespace KekecMed\Core\Views\Elements;

/**
 * Class DateTime
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class DateTime extends Date
{

    use ParameterTrait;
    
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [
        'icon'         => 'fa fa-calendar',
        'labelClass'   => 'primary',
        'trackChanges' => true,
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
        $this->defaultHandler();
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'datetime';
    }
}