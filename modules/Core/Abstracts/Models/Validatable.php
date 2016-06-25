<?php namespace KekecMed\Core\Abstracts\Models;


/**
 * Interface Validatable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\ore\Abstracts\Models
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