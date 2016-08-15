<?php

namespace KekecMed\Core\Abstracts\Views\Elements;

/**
 * Class AbstractGenericInputParameters
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Views\Elements
 */
abstract class AbstractGenericInputParameters extends AbstractGenericInput
{
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
}