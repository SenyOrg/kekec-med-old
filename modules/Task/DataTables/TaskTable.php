<?php

namespace KekecMed\Task\DataTables;

use Illuminate\Database\Eloquent\Builder;
use KekecMed\Core\DataTables\AbstractCoreDataTable;
use KekecMed\Task\Entities\Task;

/**
 * Class TaskTable
 * -----------------------------
 *
 * -----------------------------
 * @package App\DataTables
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class TaskTable extends AbstractCoreDataTable
{
    /**
     * Get route name for show
     *
     * @return string
     */
    protected function getShowRoute()
    {
        return 'task.show';
    }

    /**
     * Get Model Query
     *
     * @return Builder
     */
    protected function getModelQuery()
    {
        return Task::query();
    }

    /**
     * Get table id
     *
     * @return string
     */
    public function getTableID()
    {
        return 'taskTable';
    }

    /**
     * Get build parameters
     *
     * @return array
     */
    protected function getBuildParameter()
    {
        // Set default ordering column to `id`
        return $this->getDefaultBuildParameters();
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
            [
                'title' => 'Title',
                'name'  => 'title',
                'data'  => 'title',
                'width' => '40%',
                'class' => 'td-wrap',
            ],
            'deadline',
            'done',
            'creator_id',
            'assignee_id',
            'object_id',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @return string
     */
    protected function getExportFilename()
    {
        return 'tasks';
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
        // Add image column callback
        $eloq->addColumn('creator_id', function ($model) {
            return $model->creator()->first()->getFullName();
        });

        // Add image column callback
        $eloq->addColumn('assignee_id', function ($model) {
            return $model->assignee()->first()->getFullName();
        });

        // Add image column callback
        $eloq->addColumn('object_id', function ($model) {
            return $model->object()->first()->getFullName();
        });
    }
}
