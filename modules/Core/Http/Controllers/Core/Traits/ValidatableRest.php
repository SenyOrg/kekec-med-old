<?php namespace KekecMed\Core\Http\Controllers\Core\Traits;

/**
 * Interface ValidatableRest
 *
 * @package KekecMed\Core\Http\Controllers\Core\Traits
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