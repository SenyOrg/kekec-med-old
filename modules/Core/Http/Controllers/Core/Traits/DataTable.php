<?php namespace KekecMed\Core\Http\Controllers\Core\Traits;

/**
 * Interface DataTable
 *
 * @package KekecMed\Core\Http\Controllers\Core\Traits
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