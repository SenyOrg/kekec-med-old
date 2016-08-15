<?php

namespace KekecMed\Event\DataTables;

use Illuminate\Database\Eloquent\Builder;
use KekecMed\Core\DataTables\AbstractCoreDataTable;
use KekecMed\Event\Entities\Event;

/**
 * Class EventTable
 * -----------------------------
 *
 * -----------------------------
 * @package App\DataTables
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class EventTable extends AbstractCoreDataTable
{
    /**
     * Get route name for show
     *
     * @return string
     */
    protected function getShowRoute()
    {
        return 'event.show';
    }

    /**
     * Get Model Query
     *
     * @return Builder
     */
    protected function getModelQuery()
    {
        return Event::query();
    }

    /**
     * Get table id
     *
     * @return string
     */
    public function getTableID()
    {
        return 'eventTable';
    }

    /**
     * Get build parameters
     *
     * @return array
     */
    protected function getBuildParameter()
    {
        // Set default ordering column to `id`
        $parameter = $this->getDefaultBuildParameters();

        return $parameter;
    }

    /**
     * Get array of model attributes to display
     *
     * @return array
     */
    protected function getModelColumns()
    {
        return [
            'id',
            'title',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @return string
     */
    protected function getExportFilename()
    {
        return 'events';
    }

    /**
     * Ajax processor
     *
     * @param $eloq
     *
     * @return mixed
     */
    protected function processAjax($eloq)
    {

    }
}
