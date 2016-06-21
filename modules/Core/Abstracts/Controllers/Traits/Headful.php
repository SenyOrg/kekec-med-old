<?php namespace KekecMed\Core\Abstracts\Controllers\Traits;

/**
 * Interface Headful
 *
 * @package KekecMed\Core\Abstracts\Controllers\Traits
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