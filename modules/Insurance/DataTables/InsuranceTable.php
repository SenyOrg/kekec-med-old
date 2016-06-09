<?php

namespace KekecMed\Insurance\DataTables;

use Illuminate\Database\Eloquent\Builder;
use KekecMed\Core\DataTables\AbstractCoreDataTable;
use KekecMed\Insurance\Entities\Insurance;

/**
 * Class InsuranceTable
 * -----------------------------
 * 
 * -----------------------------
 * @package App\DataTables
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class InsuranceTable extends AbstractCoreDataTable
{
    /**
     * Get route name for show
     *
     * @return string
     */
    protected function getShowRoute()
    {
        return 'insurance.show';
    }

    /**
     * Get Model Query
     *
     * @return Builder
     */
    protected function getModelQuery()
    {
        return Insurance::query();
    }

    /**
     * Get table id
     *
     * @return string
     */
    public function getTableID()
    {
        return 'InsuranceTable';
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
            'id',
            'title',
            'homepage',
            'region',
            'rate',
            'members',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @return string
     */
    protected function getExportFilename()
    {
        return 'insurances';
    }

    /**
     * Ajax processor
     *
     * @param $eloq
     * @return mixed
     */
    protected function processAjax($eloq)
    {
        // Add image column callback
        $eloq->addColumn('homepage', function($model) {
            return '<a href="'.$model->homepage.'"><i class="fa fa-globe"></i> Visit</a>';
        });

        // Add image column callback
        $eloq->addColumn('members', function($model) {
            return $model->patients->count();
        });
    }
}
