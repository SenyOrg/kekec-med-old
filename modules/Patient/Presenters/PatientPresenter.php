<?php

namespace KekecMed\Patient\Presenters;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Views\Elements;
use KekecMed\Core\Views\Forms\FormElement;
use KekecMed\Insurance\Entities\Insurance;

/**
 * Class PatientPresenter
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Patient\Presenters
 */
class PatientPresenter extends AbstractPresenter
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
     * Get Gender
     *
     * @return static
     */
    public function getGender()
    {
        return FormElement::factory('Gender', Elements::select([
            'name'    => 'gender',
            'value'   => $this->getModel()->gender,
            'options' => ['m' => 'Male', 'w' => 'Female'],
        ]))->render($this->getViewMode());
    }

    /**
     * Get Birthdate
     *
     * @return static
     */
    public function getBirthdate()
    {
        return FormElement::factory('Birthdate', Elements::date([
            'name'  => 'birthdate',
            'value' => $this->getModel()->birthdate,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance Type
     *
     * @return static
     */
    public function getInsuranceType()
    {
        return FormElement::factory('Insurance Type', Elements::text([
            'name'  => 'insurance_type',
            'value' => $this->getModel()->insurance_type,
        ]))->render($this->getViewMode());
    }

    /**
     * Get insurance
     *
     * @return static
     */
    public function getInsurance()
    {
        return FormElement::factory('Insurance', Elements::select([
            'name'  => 'insurance_id',
            'model' => Insurance::class,
            'value' => $this->getModel()->insurance_id,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getInsuranceNo()
    {
        return FormElement::factory('Insurance No', Elements::text([
            'name'  => 'insurance_no',
            'value' => $this->getModel()->insurance_no,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getPhone()
    {
        return FormElement::factory('Phone', Elements::phone([
            'name'  => 'phone',
            'value' => $this->getModel()->phone,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getMobile()
    {
        return FormElement::factory('Mobile', Elements::mobilePhone([
            'name'  => 'mobile',
            'value' => $this->getModel()->mobile,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getEmail()
    {
        return FormElement::factory('E-mail', Elements::email([
            'name'  => 'email',
            'value' => $this->getModel()->email,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getStreet()
    {
        return FormElement::factory('Street', Elements::text([
            'name'  => 'street',
            'value' => $this->getModel()->street,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getStreetNo()
    {
        return FormElement::factory('No', Elements::text([
            'name'  => 'no',
            'value' => $this->getModel()->no,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getZipcode()
    {
        return FormElement::factory('Zipcode', Elements::text([
            'name'  => 'zipcode',
            'value' => $this->getModel()->zipcode,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance No
     *
     * @return static
     */
    public function getImage()
    {
        return FormElement::factory('Image', Elements::file([
            'name'   => 'image',
            'accept' => 'image/*',
            'value'  => $this->getModel()->image,
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