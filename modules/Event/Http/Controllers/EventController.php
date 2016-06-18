<?php namespace KekecMed\Event\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Http\Controllers\Core\Traits\Breadcrumbful;
use KekecMed\Core\Http\Controllers\Core\Traits\Headful;
use KekecMed\Core\Http\Controllers\Core\View\AbstractViewController;
use KekecMed\Core\Http\Controllers\CoreDataTableController;
use KekecMed\Core\Http\Controllers\DataTable;
use KekecMed\Event\Entities\Event;
use KekecMed\Event\Entities\EventParticipant;

class EventController extends AbstractViewController
    implements \KekecMed\Core\Http\Controllers\Core\Traits\DataTable, Breadcrumbful, Headful
{

    /**
     * Get DataTable
     *
     * @return DataTable
     */
    public function getDataTable()
    {
        return app('KekecMed\Event\DataTables\EventTable');
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
        return 'event::index';
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
                'Events',
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
                    'icon' => 'fa fa-event'
                ]
            );
        });
    }

    /**
     * Get model class
     *
     * @return Model::class
     */
    protected function getModelClass()
    {
        return Event::class;
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
                    'icon' => 'fa fa-event'
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
                    'icon' => 'fa fa-event'
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
        return 'Events';
    }

    /**
     * Get SubPageHeader
     *
     * @return string
     */
    public function getPageSubHeader()
    {
        return null;
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'event';
    }

    protected function createModel($data)
    {
        $data['creator_id'] = \Auth::user()->id;

        $model = parent::createModel($data);

        if (isset($data['participants'])) {
            foreach ($data['participants'] as $userID) {
                EventParticipant::create(['participant_id' => $userID, 'event_id' => $model->id]);
            }
        }

        return $model;
    }

    protected function updateModel($id, array $data)
    {
        $class = $this->getModelClass();

        $class::findOrFail($id)->update($data);
        $class::findOrFail($id)->participants()->delete();

        if (isset($data['participants'])) {
            foreach ($data['participants'] as $userID) {
                EventParticipant::create(['participant_id' => $userID, 'event_id' => $id]);
            }
        }
    }
}