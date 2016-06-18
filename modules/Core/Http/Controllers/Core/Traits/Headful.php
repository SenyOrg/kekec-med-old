<?php namespace KekecMed\Core\Http\Controllers\Core\Traits;

/**
 * Interface Headful
 *
 * @package KekecMed\Core\Http\Controllers\Core\Traits
 */
interface Headful
{
    /**
     * Get PageHeader
     *
     * @return string
     */
    public function getPageHeader();

    /**
     * Get SubPageHeader
     *
     * @return string
     */
    public function getPageSubHeader();
}