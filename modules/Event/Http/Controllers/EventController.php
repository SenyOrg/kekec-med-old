<?php namespace KekecMed\Event\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Http\Controllers\Core\View\AbstractViewController;
use KekecMed\Core\Http\Controllers\CoreDataTableController;
use KekecMed\Core\Http\Controllers\DataTable;
use KekecMed\Event\Entities\Event;
use KekecMed\Event\Entities\EventParticipant;

class EventController extends AbstractViewController
    implements \KekecMed\Core\Http\Controllers\Core\Traits\DataTable
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

    /**
     * Get model class
     *
     * @return Model::class
     */
    protected function getModelClass()
    {
        return Event::class;
    }
}