<?php namespace KekecMed\Calendar\Http\Controllers;

use KekecMed\Calendar\Entities\Calendar;
use KekecMed\Core\Http\Controllers\Core\RestFul\AbstractRestFulGenericController;
use KekecMed\Core\Http\Controllers\Core\Traits\Breadcrumbful;
use KekecMed\Core\Http\Controllers\Core\Traits\Headful;

class CalendarController extends AbstractRestFulGenericController
    implements Breadcrumbful, Headful
{

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
                'Calendar',
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
                'All Events',
                [],
                0,
                [
                    'icon' => 'fa fa-calendar'
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
                    'icon' => 'fa fa-calendar'
                ]
            );
        });
    }

    /**
     * Get model class
     *
     * @return \KekecMed\Core\Http\Controllers\Core\RestFul\Model::class
     */
    protected function getModelClass()
    {
        return Calendar::class;
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
                $model->title,
                [
                    'id' => $model->id
                ],
                0,
                [
                    'icon' => 'fa fa-calendar'
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
        return 'Calendar';
    }

    /**
     * Get SubPageHeader
     *
     * @return string
     */
    public function getPageSubHeader()
    {
        return 'Organization and Collaboration';
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'calendar';
    }
}