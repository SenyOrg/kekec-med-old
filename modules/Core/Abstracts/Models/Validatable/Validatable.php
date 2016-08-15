<?php namespace KekecMed\Core\Abstracts\Models\Validatable;


/**
 * Interface Validatable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
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