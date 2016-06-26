<?php namespace KekecMed\Core\Abstracts\Models;

use Illuminate\Validation\Validator;

/**
 * Trait ValidatableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
trait ValidatableModel
{
    /**
     *
     * @param Validatable $u
     *
     * @return mixed
     */
    public function callValidatable(Validatable $u)
    {
        /** @var ValidatableModel $u */
        $closure = $u->getValidationClosure();

        return $closure($u);
    }

    /**
     * Returns closure for validation routine
     *
     * @return \Closure
     */
    public function getValidationClosure()
    {
        /**
         * @param Validatable $model
         *
         * @return bool|Validator
         */
        return function (Validatable $model) {
            /** @var Validator $validator */
            /** @var ValidatableModel $model */
            $validator = $model->getValidator();

            if ($validator->fails()) {
                return $validator;
            }

            return true;
        };
    }

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

            return \Validator::make($this->attributesToArray(), $rules['rules'], $rules['messages']);
        }

        throw new \Exception('ValidatableModel needs a Model that implements Validatable Interface');
    }
}