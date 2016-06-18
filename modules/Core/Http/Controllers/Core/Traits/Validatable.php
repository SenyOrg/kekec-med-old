<?php namespace KekecMed\Core\Http\Controllers\Core\Traits;

/**
 * Interface Validatable
 *
 * @package KekecMed\Core\Http\Controllers\Core\Traits
 */
interface Validatable
{
    /**
     * Get Validation Rules
     *
     * @return array
     */
    public function getValidationRules();
}