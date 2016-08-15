<?php

namespace KekecMed\Consultation\DataTables;

use Illuminate\Database\Eloquent\Builder;
use KekecMed\Consultation\Entities\Consultation;
use KekecMed\Core\DataTables\AbstractCoreDataTable;

/**
 * Class TaskTable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Consultation\DataTables
 */
class ConsultationTable extends AbstractCoreDataTable
{
    /**
     * Get table id
     *
     * @return string
     */
    public function getTableID()
    {
        return 'consultationTable';
    }

    /**
     * Get route name for show
     *
     * @return string
     */
    protected function getShowRoute()
    {
        return 'consultation.show';
    }

    /**
     * Get Model Query
     *
     * @return Builder
     */
    protected function getModelQuery()
    {
        return Consultation::query();
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
            'event_id',
            'patient_id',
            'start',
            'end',
        ];
    }

    /**
     * @return string
     */
    protected function getExportFilename()
    {
        return 'consultation';
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
        $eloq->addColumn('event_id', function ($model) {
            return $model->event->getPresenter()->getRepresentable();
        });

        // Add image column callback
        $eloq->addColumn('patient_id', function ($model) {
            return $model->patient->getPresenter()->getRepresentable();
        });
    }
}
