<?php

namespace KekecMed\Core\Views\Elements;

use KekecMed\Core\Abstracts\Views\Elements\AbstractGenericInput;

/**
 * Class Text
 *
 * General input element
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class Text extends AbstractGenericInput
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [];

    /**
     * Parameters
     *
     * @var array
     */
    protected $parameters = [
        /**
         * HTML-Markup
         */
        'type'        => 'text',
        'placeholder' => '',
        'readonly'    => false,
        'class'       => 'form-control',
        'disabled'    => false,
        'style'       => '',

        /**
         * JS-Events
         */
        'events'      => [
            'blur',
            'change',
            'click',
            'contextmenu',
            'dblclick',
            'error',
            'focus',
            'focusin',
            'focusout',
            'hover',
            'keydown',
            'keypress',
            'keyup',
            'mousedown',
            'mousenter',
            'mouseleave',
            'mousemove',
            'mouseout',
            'mouseup',
            'scroll',
            'select',
            'submit',
        ],

        /**
         * Data Attributes
         */
        'attributes'  => [
            /**
             * Add your data-attributes here to handle everything
             */
        ]
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
        /**
         * Value Handling
         */
        if (!isset($this->parameters['value']) || is_null($this->parameters['value'])) {
            /**
             * Get Model if present
             */
            $model = static::model();

            if ($model !== null) {
                /**
                 * Get Models value for given propertyIndex
                 */
                $value = $model->{$this->parameters['name']};

                /**
                 * Set it if present
                 */
                if ($value != null) {
                    $this->parameters['value'] = $value;
                }
            }
        }

        if (!isset($this->parameters['id'])) {
            $this->parameters['id'] = $this->parameters['name'] . '_id';
        }
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'text';
    }
}