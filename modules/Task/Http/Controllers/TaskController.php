<?php namespace KekecMed\Task\Http\Controllers;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Http\Controllers\Core\Traits\DataTable;
use KekecMed\Core\Http\Controllers\Core\Traits\ValidatableRest;
use KekecMed\Core\Http\Controllers\Core\View\AbstractViewController;
use KekecMed\Core\Http\Controllers\CoreConventionalResourceViewController;
use KekecMed\Core\Http\Controllers\CoreDataTableController;
use KekecMed\Core\Http\Controllers\CoreValidationController;
use KekecMed\Task\Entities\Task;

class TaskController extends AbstractViewController
    implements DataTable, ValidatableRest
{

    /**
     * Get DataTable
     *
     * @return \KekecMed\Core\Http\Controllers\DataTable
     */
    public function getDataTable()
    {
        return app('KekecMed\Task\DataTables\TaskTable');
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
        return 'task::index';
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
        return Task::class;
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'task';
    }
}