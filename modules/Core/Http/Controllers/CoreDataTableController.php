<?php

namespace KekecMed\Core\Http\Controllers;

/**
 * Interface CoreDataTableController
 * @package KekecMed\Core\Http\Controllers
 */
interface CoreDataTableController
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