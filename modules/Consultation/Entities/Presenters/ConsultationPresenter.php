<?php

namespace KekecMed\Consultation\Entities\Presenters;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Views\Elements;
use KekecMed\Core\Views\Forms\FormElement;

/**
 * Class ConsultationPresenter
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Consultation\Presenters
 */
class ConsultationPresenter extends AbstractPresenter
{
    /**
     * Firstname
     *
     * @return static
     */
    public function getEvent()
    {
        return FormElement::factory('Event', Elements::select([
            'name'  => 'event_id',
            'model' => $this->getModel()->event(),
            'value' => $this->getModel()->event_id
        ]))->render($this->getViewMode());
    }

    /**
     * Firstname
     *
     * @return static
     */
    public function getPatient()
    {
        return FormElement::factory('Patient', Elements::select([
            'name'  => 'patient_id',
            'model' => $this->getModel()->patient(),
            'value' => $this->getModel()->event_id
        ]))->render($this->getViewMode());
    }

    /**
     * Firstname
     *
     * @return static
     */
    public function getDescription()
    {
        return FormElement::factory('Description', Elements::text([
            'name'  => 'description',
            'value' => $this->getModel()->description
        ]))->render($this->getViewMode());
    }

    /**
     * Get Representable String
     *
     * @return string
     */
    public function getRepresentable()
    {
        return 'Consultation #' . $this->getModel()->id;
    }
}