<?php namespace KekecMed\Insurance\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Abstracts\Controllers\Traits\Breadcrumbful;
use KekecMed\Core\Abstracts\Controllers\Traits\DataTable;
use KekecMed\Core\Abstracts\Controllers\Traits\Headful;
use KekecMed\Core\Abstracts\Controllers\Traits\ValidatableRest;
use KekecMed\Core\Abstracts\Controllers\View\AbstractViewController;
use KekecMed\Core\Abstracts\ControllersConventionalResourceViewController;
use KekecMed\Core\Abstracts\ControllersDataTableController;
use KekecMed\Core\Abstracts\ControllersValidationController;
use KekecMed\Insurance\Entities\Insurance;

class InsuranceController extends AbstractViewController
    implements DataTable, ValidatableRest, Breadcrumbful, Headful
{

    /**
     * Get DataTable
     *
     * @return \KekecMed\Core\DataTables\AbstractCoreDataTable
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
     * Breadcrumb: Root
     *
     * @return void
     */
    public function rootBreadcrumb()
    {
        $this->getViewComponent()->modifyBreadcrumb(function ($menu) {
            $menu->route(
                $this->getRouteName('index'),
                'Insurances',
                [],
                0,
                []
            );
        });
    }

    /**
     * Breadcrumb: Index
     *
     * @return void
     */
    public function indexBreadcrumb()
    {
        $this->getViewComponent()->modifyBreadcrumb(function ($menu) {
            $menu->route(
                $this->getRouteName('index'),
                'All Insurances',
                [],
                0,
                [
                    'icon' => 'fa fa-list'
                ]
            );
        });
    }

    /**
     * Breadcrumb: Edit
     *
     * @return void
     */
    public function editBreadcrumb($id)
    {
        $class = $this->getModelClass();
        $model = $class::find($id);
        $this->getViewComponent()->modifyBreadcrumb(function ($menu) use ($model) {
            $menu->route(
                $this->getRouteName('edit'),
                $model->title,
                [
                    'id' => $model->id
                ],
                0,
                [
                    'icon' => 'fa fa-life-ring'
                ]
            );
        });
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
     * Breadcrumb: Create
     *
     * @return void
     */
    public function createBreadcrumb()
    {
        $this->getViewComponent()->modifyBreadcrumb(function ($menu) {
            $menu->route(
                $this->getRouteName('create'),
                '[Event title]',
                [],
                0,
                [
                    'icon' => 'fa fa-life-ring'
                ]
            );
        });
    }

    /**
     * Breadcrumb: Show
     *
     * @return void
     */
    public function showBreadcrumb($id)
    {
        $class = $this->getModelClass();
        $model = $class::find($id);
        $this->getViewComponent()->modifyBreadcrumb(function ($menu) use ($model) {
            $menu->route(
                $this->getRouteName('show'),
                $model->title,
                [
                    'id' => $model->id
                ],
                0,
                [
                    'icon' => 'fa fa-life-ring'
                ]
            );
        });
    }

    /**
     * Get PageHeader
     *
     * @return string
     */
    public function getPageHeader()
    {
        return 'Insurances';
    }

    /**
     * Get SubPageHeader
     *
     * @return string
     */
    public function getPageSubHeader()
    {
        return 'Manage insurances';
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