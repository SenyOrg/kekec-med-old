<?php namespace KekecMed\Insurance\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Http\Controllers\Core\Traits\DataTable;
use KekecMed\Core\Http\Controllers\Core\Traits\ValidatableRest;
use KekecMed\Core\Http\Controllers\Core\View\AbstractViewController;
use KekecMed\Core\Http\Controllers\CoreConventionalResourceViewController;
use KekecMed\Core\Http\Controllers\CoreDataTableController;
use KekecMed\Core\Http\Controllers\CoreValidationController;
use KekecMed\Insurance\Entities\Insurance;

class InsuranceController extends AbstractViewController
    implements DataTable, ValidatableRest
{

    /**
     * Get DataTable
     *
     * @return \KekecMed\Core\Http\Controllers\DataTable
     */
    public function getDataTable()
    {
        return app('KekecMed\Insurance\DataTables\InsuranceTable');
    }

    /**
     * Get DataTable index template
     *
     * 'module::index'
     *
     * @return string
     */
    public function getDataTableTemplatePath()
    {
        return 'insurance::index';
    }

    /**
     * Get Validation rules
     *
     * @return array
     */
    public function getValidationRules()
    {
        // TODO: Implement validation rules
        return [];
    }

    /**
     * Should request validated while update procedure
     *
     * @return boolean
     */
    public function validateOnUpdate()
    {
        return true;
    }

    /**
     * Should request validated while store procedure
     *
     * @return boolean
     */
    public function validateOnStore()
    {
        return true;
    }

    /**
     * Get model class
     *
     * @return Model
     */
    protected function getModelClass()
    {
        return Insurance::class;
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'insurance';
    }
}