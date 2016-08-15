<?php namespace KekecMed\Consultation\Http\Controllers;

use KekecMed\Consultation\Entities\Consultation;
use KekecMed\Core\Abstracts\Controllers\Traits\Breadcrumbful;
use KekecMed\Core\Abstracts\Controllers\Traits\DataTable;
use KekecMed\Core\Abstracts\Controllers\Traits\Headful;
use KekecMed\Core\Abstracts\Controllers\Traits\ValidatableRest;
use KekecMed\Core\Abstracts\Controllers\View\AbstractViewController;
use Pingpong\Menus\MenuBuilder;

/**
 * Class ConsultationController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Consultation\Http\Controllers
 */
class ConsultationController extends AbstractViewController implements DataTable, ValidatableRest, Breadcrumbful, Headful
{
    /**
     * Breadcrumb: Root
     *
     * @return void
     */
    public function rootBreadcrumb()
    {
        $this->getViewComponent()->modifyBreadcrumb(function (MenuBuilder $menu) {
            $menu->route(
                $this->getRouteName('index'),
                'Consultations',
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
        // TODO: Implement indexBreadcrumb() method.
    }

    /**
     * Breadcrumb: Edit
     *
     * @return void
     */
    public function editBreadcrumb($id)
    {
        $this->getViewComponent()->modifyBreadcrumb(function (MenuBuilder $menu) use ($id) {
            $menu->route(
                $this->getRouteName('edit'),
                'ID #' . $id,
                [
                    'id' => $id
                ],
                0,
                [
                    'icon' => 'fa fa-user'
                ]
            );
        });
    }

    /**
     * Breadcrumb: Create
     *
     * @return void
     */
    public function createBreadcrumb()
    {
        $this->getViewComponent()->modifyBreadcrumb(function (MenuBuilder $menu) {
            $menu->route(
                $this->getRouteName('create'),
                'New Consultation',
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

        /** @var Patient $model */
        $model = $class::find($id);
        $this->getViewComponent()->modifyBreadcrumb(function (MenuBuilder $menu) use ($model) {
            $menu->route(
                $this->getRouteName('show'),
                'ID #' . $model->idd,
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
     * @return \Eloquent
     */
    protected function getModelClass()
    {
        return Consultation::class;
    }

    /**
     * Get DataTable
     *
     * @return DataTable
     */
    public function getDataTable()
    {
        return app('KekecMed\Consultation\DataTables\ConsultationTable');
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
        return 'consultation::index';
    }

    /**
     * Get Validation Rules
     *
     * @return array
     */
    public function getValidationRules()
    {
        // TODO: Implement getValidationRules() method.
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
     * Get PageHeader
     *
     * @return string
     */
    public function getPageHeader()
    {
        return 'Consultations';
    }

    /**
     * Get SubPageHeader
     *
     * @return string
     */
    public function getPageSubHeader()
    {
        return '';
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'consultation';
    }
}