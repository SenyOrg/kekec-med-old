<?php namespace KekecMed\Core\Abstracts\Controllers\Traits;

/**
 * Interface DataTable
 *
 * @package KekecMed\Core\Abstracts\Controllers\Traits
 */
interface DataTable
{
    /**
     * Get DataTable
     *
     * @return DataTable
     */
    public function getDataTable();

    /**
     * Get DataTable index template
     *
     * 'module::index'
     *
     * @return string
     */
    public function getDataTableTemplatePath();
}