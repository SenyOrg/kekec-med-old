<?php

namespace KekecMed\Core\Http\Controllers;

/**
 * Interface CoreValidationController
 * @package KekecMed\Core\Http\Controllers
 */
interface CoreValidationController
{
    /**
     * Get Validation rules
     *
     * @return array
     */
    public function getValidationRules();
}