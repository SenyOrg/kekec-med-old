<?php

namespace KekecMed\Core\Views\Forms;

use KekecMed\Core\Abstracts\Views\Elements\AbstractElement;
use KekecMed\Core\Abstracts\Views\Forms\AbstractFormElement;

/**
 * Class FormElement
 *
 * General FormElement
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Forms
 */
class FormElement extends AbstractFormElement
{
    /**
     * Get corresponding Element
     *
     * @return AbstractElement
     * @throws \Exception
     */
    protected function getElement()
    {
        throw new \Exception('General FormElement does not provide a default input element. Please define one in constructor.');
    }
}