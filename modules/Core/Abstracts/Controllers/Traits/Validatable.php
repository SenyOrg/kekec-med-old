<?php namespace KekecMed\Core\Abstracts\Controllers\Traits;

/**
 * Interface Validatable
 *
 * @package KekecMed\Core\Abstracts\Controllers\Traits
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