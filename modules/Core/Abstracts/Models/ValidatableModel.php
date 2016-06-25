<?php namespace KekecMed\Core\Abstracts\Models;

/**
 * Trait ValidatableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
trait ValidatableModel
{
    /**
     * Get Validator for Model
     *
     * @return \Illuminate\Validation\Validator
     * @throws \Exception
     */
    public function getValidator()
    {
        if ($this instanceof Validatable) {
            $rules = $this->getValidationRules();

            return \Validator::make($this->attributes, $rules['rules'], $rules['messages']);
        }

        throw new \Exception('ValidatableModel needs a Model that implements Validatable Interface');
    }
}