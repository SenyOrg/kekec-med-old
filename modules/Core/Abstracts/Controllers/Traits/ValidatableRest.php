<?php namespace KekecMed\Core\Abstracts\Controllers\Traits;

/**
 * Interface ValidatableRest
 *
 * @package KekecMed\Core\Abstracts\Controllers\Traits
 */
interface ValidatableRest extends Validatable
{
    /**
     * Should request validated while update procedure
     *
     * @return boolean
     */
    public function validateOnUpdate();

    /**
     * Should request validated while store procedure
     *
     * @return boolean
     */
    public function validateOnStore();
}