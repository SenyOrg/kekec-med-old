<?php

namespace KekecMed\Core\Abstracts\Views\Forms;

use Illuminate\Support\HtmlString;
use KekecMed\Core\Abstracts\Views\Elements\AbstractElement;

/**
 * Class AbstractFormElement
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Views\Forms
 */
abstract class AbstractFormElement
{
    /**
     * Label
     *
     * @var string
     */
    protected $label = null;

    /**
     * Input Element
     *
     * @var AbstractElement
     */
    protected $element = null;

    /**
     * AbstractFormElement constructor.
     *
     * @param $label
     * @param $elementParameters
     */
    public function __construct($label, $elementParameters)
    {
        /**
         * Do we have a fully configured instance
         */
        if (!is_array($elementParameters)) {
            $this->element = $elementParameters;
        } else {
            /**
             * Let us create a new Element
             */
            $class = $this->getElement();
            $this->element = $class::factory($elementParameters);
        }

        $this->label = $label;
    }

    /**
     * Get corresponding Element
     *
     * @return AbstractElement
     */
    protected abstract function getElement();

    /**
     * Factory
     *
     * @param $label
     * @param $elementParameters
     *
     * @return static
     */
    public static function factory($label, $elementParameters)
    {
        return new static($label, $elementParameters);
    }

    /**
     * Render Form Element
     *
     * @param null $viewMode
     *
     * @return HtmlString
     */
    public function render($viewMode = null)
    {
        /**
         * Set ViewMode
         */
        if ($viewMode) {
            $this->element->setViewMode($viewMode);
        }

        return new HtmlString(view('core::forms.main', [
            'label'      => $this->label,
            'element'    => $this->element,
            'parameters' => $this->element->getParameters()
        ]));
    }
}