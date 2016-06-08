<?php namespace KekecMed\Patient\Http\Controllers;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Http\Controllers\CoreConventionalResourceController;
use KekecMed\Core\Http\Controllers\CoreDataTableController;
use KekecMed\Core\Http\Controllers\CoreValidationController;
use KekecMed\Insurance\Entities\Insurance;
use KekecMed\Patient\Entities\Patient;

class PatientController extends CoreConventionalResourceController
    implements CoreDataTableController, CoreValidationController
{

    /**
     * Get DataTable
     *
     * @return \KekecMed\Core\Http\Controllers\DataTable
     */
    public function getDataTable()
    {
        return app('KekecMed\Patient\DataTables\PatientTable');
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
        return 'patient::index';
    }

    /**
     * Get model class
     *
     * @return Model
     */
    protected function getModelClass()
    {
        return Patient::class;
    }

    /**
     * Get model for create()
     *
     * @return Model
     */
    public function getModelForCreate()
    {
        $model = $this->getModel();
        $model->insurance = new Insurance();

        return $model;
    }


    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'patient';
    }

    /**
     * Get Validation rules
     *
     * @return array
     */
    public function getValidationRules()
    {
        // TODO: Implement validation rules

        return [];
    }
}