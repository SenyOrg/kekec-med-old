<?php

namespace KekecMed\Patient\DataTables;

use Illuminate\Database\Eloquent\Builder;
use KekecMed\Core\DataTables\AbstractCoreDataTable;
use KekecMed\Patient\Entities\Patient;

/**
 * Class PatientTable
 * -----------------------------
 * 
 * -----------------------------
 * @package App\DataTables
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class PatientTable extends AbstractCoreDataTable
{
    /**
     * Get route name for show
     *
     * @return string
     */
    protected function getShowRoute()
    {
        return 'patient.show';
    }

    /**
     * Get Model Query
     *
     * @return Builder
     */
    protected function getModelQuery()
    {
        return Patient::query();
    }

    /**
     * Get table id
     *
     * @return string
     */
    protected function getTableID()
    {
        return 'patientTable';
    }

    /**
     * Get build parameters
     *
     * @return array
     */
    protected function getBuildParameter()
    {
        $parameter = $this->getDefaultBuildParameters();
        $parameter['order'][0][0] = 1;

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
            [
                'defaultContent' => 'No',
                'data'           => 'image',
                'name'           => 'Image',
                'title'          => '',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
                'style'          => ''
            ],
            'id',
            'firstname',
            'lastname',
            'street',
            'phone',
            'mobile',
            'email',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @return string
     */
    protected function getExportFilename()
    {
        return 'patients';
    }

    /**
     * Ajax processor
     *
     * @param $eloq
     * @return mixed
     */
    protected function processAjax($eloq)
    {
        $eloq->addColumn('image', function($model) {
            return '<img src="'.$model->getImageUrl().'" width="50" height="50"/>';
        });
    }
}
