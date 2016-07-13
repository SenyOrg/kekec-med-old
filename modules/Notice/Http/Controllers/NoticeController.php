<?php namespace KekecMed\Notice\Http\Controllers;

use KekecMed\Core\Abstracts\Controllers\Traits\Breadcrumbful;
use KekecMed\Core\Abstracts\Controllers\Traits\DataTable;
use KekecMed\Core\Abstracts\Controllers\Traits\Headful;
use KekecMed\Core\Abstracts\Controllers\Traits\ValidatableRest;
use KekecMed\Core\Abstracts\Controllers\View\AbstractViewController;
use KekecMed\Notice\Entities\Notice;
use Pingpong\Menus\MenuBuilder;

/**
 * Class NoticeController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Notice\Http\Controllers
 */
class NoticeController extends AbstractViewController
    implements DataTable, ValidatableRest, Breadcrumbful, Headful
{

    /**
     * Get DataTable
     *
     * @return DataTable
     */
    public function getDataTable()
    {
        // TODO: Implement getDataTable() method.
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
        // TODO: Implement getDataTableTemplatePath() method.
    }

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
                'Notices',
                [],
                0,
                [
                    'icon' => 'fa fa-comments-o'
                ]
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
        $class = $this->getModelClass();

        /** @var Patient $model */
        $model = $class::find($id);

        $this->getViewComponent()->modifyBreadcrumb(function (MenuBuilder $menu) use ($model) {
            $menu->route(
                $this->getRouteName('edit'),
                $model->title,
                [
                    'id' => $model->id
                ],
                0,
                [
                    'icon' => 'fa fa-comments-o'
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
        return Notice::class;
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
                '[NOTICE TITLE]',
                [],
                0,
                [
                    'icon' => 'fa fa-comments-o'
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
                $model->title,
                [
                    'id' => $model->id
                ],
                0,
                [
                    'icon' => 'fa fa-comments-o'
                ]
            );
        });
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
        return 'Notices';
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
        return 'notice';
    }
}