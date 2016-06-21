<?php namespace KekecMed\Patient\Http\Controllers;

use App\Http\Requests;
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
use KekecMed\Patient\Entities\Patient;

class PatientController extends AbstractViewController
    implements DataTable, ValidatableRest, Breadcrumbful, Headful
{

    /**
     * Get DataTable
     *
     * @return \KekecMed\Core\DataTables\AbstractCoreDataTable
     */
    public function getDataTable()
    {
        return app('KekecMed\Patient\DataTables\PatientTable');
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
        return 'patient::index';
    }

    /**
     * Get model for create()
     *
     * @return Model
     */
    public function getModelForCreate()
    {
        $model = $this->getModel();
        $model->insurance = new Insurance();

        return $model;
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
                'Patients',
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
                'All Patients',
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
                $model->getFullName(),
                [
                    'id' => $model->id
                ],
                0,
                [
                    'icon' => 'fa fa-user'
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
        return Patient::class;
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
                '[Firstname] [Lastname]',
                [],
                0,
                [
                    'icon' => 'fa fa-user'
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
                $model->getFullName(),
                [
                    'id' => $model->id
                ],
                0,
                [
                    'icon' => 'fa fa-user'
                ]
            );
        });
    }

    /**
     * Get model for create()
     *
     * @return Model
     */
    public function getCreateModel()
    {
        $model = parent::getCreateModel();
        $model->insurance = new Insurance();

        return $model;
    }

    /**
     * Get PageHeader
     *
     * @return string
     */
    public function getPageHeader()
    {
        return 'Patients';
    }

    /**
     * Get SubPageHeader
     *
     * @return string
     */
    public function getPageSubHeader()
    {
        return 'Organize and manage your patients';
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'patient';
    }
}