<?php

namespace KekecMed\Core\DataTables;

use Illuminate\Database\Eloquent\Builder;
use Yajra\Datatables\Services\DataTable;

/**
 * Class AbstractCoreDataTable
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\DataTables
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
abstract class AbstractCoreDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        // Create eloquent
        $eloq = $this->datatables->eloquent($this->query());

        // Add action column
        $eloq->addColumn('action', function ($model) {
            return '<a href="' . route($this->getShowRoute(), ['id' => $model->id]) . '" class="btn btn-default"><i class="fa fa-link"></i> Show</a>';
        });

        // Process ajax
        $this->processAjax($eloq);

        return $eloq->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->applyScopes($this->getModelQuery());
    }

    /**
     * Get Model Query
     *
     * @return Builder
     */
    abstract protected function getModelQuery();

    /**
     * Get show route
     *
     * @return mixed
     */
    abstract protected function getShowRoute();

    /**
     * Ajax processor
     *
     * @param $eloq
     * @return mixed
     */
    abstract protected function processAjax($eloq);

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return $this->getModelColumns();
    }

    /**
     * Get array of model attributes to display
     *
     * @return array
     */
    abstract protected function getModelColumns();

    public function getBuilderParameters()
    {
        return $this->getBuildParameter();
    }

    /**
     * Get build parameter
     *
     * @return array
     */
    abstract protected function getBuildParameter();

    protected function getDefaultBuildParameters()
    {
        $tableID = $this->getTableID();

        return [
            'order' => [[0, 'asc']],
            'buttons' => [
                'create',
                'export',
                'print',
                'reset',
                'reload',
            ],
            "initComplete" => 'function(settings, json) {
                $("#' . $tableID . '_filter input").detach().appendTo($("#' . $tableID . '_filter").parent()).
                    parent().append(\'<div class="input-group-btn"><button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button></div>\');
                    $("#' . $tableID . '_filter").detach();
                $(\'#' . $tableID . '_processing\').attr(\'class\', \'alert alert-info text-bold\').html("<i class=\"fa fa-cog\"></i> Loading").attr("style", "display: block; position: absolute; left: 50%;");
            }',
            'dom' => "<'box data-table-wrapper'<'box-header with-border'lr<'box-tools'<'input-group input-group-sm'f>>><'box-body no-padding data-table-wrapper't><'box-footer clearfix'p>>'",
            'language' => [
                'paginate' => [
                    'next' => '&raquo;',
                    'previous' => '&laquo;'
                ],
                "lengthMenu" => "<div class=''>_MENU_ entries</div>",
                "zeroRecords" => "<span class='label label-danger'><i class='fa fa-times'></i> No records found...</span>",
                "info" => "Showing page _PAGE_ of _PAGES_",
                "infoEmpty" => "<span class='label label-danger'><i class='fa fa-times'></i> No records available...</span>",
                "infoFiltered" => "(filtered from _MAX_ total records)"
            ]
        ];
    }

    /**
     * Get table ID
     *
     * @return string
     */
    abstract public function getTableID();

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return $this->getExportFilename();
    }

    /**
     * @return string
     */
    abstract protected function getExportFilename();
}
