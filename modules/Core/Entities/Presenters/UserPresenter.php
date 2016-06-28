<?php

namespace KekecMed\Core\Entities\Presenters;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;

/**
 * Class UserPresenter
 *
 * @package KekecMed\Core\Entities\Presenters
 */
class UserPresenter extends AbstractPresenter
{
    /**
     * Firstname
     *
     * @return static
     */
    public function getFirstname()
    {
        return FormElement::factory('Firstname', Elements::text([
            'name'  => 'firstname',
            'value' => $this->getModel()->firstname
        ]))->render($this->getViewMode());
    }

    /**
     * Firstname
     *
     * @return static
     */
    public function getLastname()
    {
        return FormElement::factory('Lastname', Elements::text([
            'name'  => 'lastname',
            'value' => $this->getModel()->lastname
        ]))->render($this->getViewMode());
    }

    /**
     * Get Representable String
     *
     * @return string
     */
    public function getRepresentable()
    {
        return $this->getModel()->getFullName();
    }
}