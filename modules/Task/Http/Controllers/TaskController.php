<?php namespace KekecMed\Task\Http\Controllers;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use KekecMed\Core\Http\Controllers\CoreConventionalResourceViewController;
use KekecMed\Core\Http\Controllers\CoreDataTableController;
use KekecMed\Core\Http\Controllers\CoreValidationController;
use KekecMed\Task\Entities\Task;

class TaskController extends CoreConventionalResourceViewController
	implements CoreDataTableController, CoreValidationController
{

	/**
	 * Get DataTable
	 *
	 * @return \KekecMed\Core\Http\Controllers\DataTable
	 */
	public function getDataTable()
	{
		return app('KekecMed\Task\DataTables\TaskTable');
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
		return 'task::index';
	}

	/**
	 * Get model class
	 *
	 * @return Model
	 */
	protected function getModelClass()
	{
		return Task::class;
	}

	/**
	 * Get model for create()
	 *
	 * @return Model
	 */
	public function getModelForCreate()
	{
		$model = $this->getModel();

		return $model;
	}


	/**
	 * Get Module identifier
	 *
	 * @return string
	 */
	protected function getIdentifier()
	{
		return 'task';
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

	/**
	 * Executed before index
	 *
	 * @return mixed
	 */
	protected function beforeIndex()
	{
		// TODO: Implement beforeIndex() method.
	}

	/**
	 * Execute before store()
	 *
	 * @param array $data
	 * @return mixed
	 */
	protected function beforeStore(array $data)
	{
		// TODO: Implement beforeStore() method.
	}

	/**
	 * Execute after store()
	 *
	 * @param Model $model
	 * @return mixed
	 */
	protected function afterStore(Model $model)
	{
		// TODO: Implement afterStore() method.
	}

	/**
	 * Before update()
	 *
	 * @param $id
	 * @param $data
	 * @return mixed
	 */
	protected function beforeUpdate($id, $data)
	{
		// TODO: Implement beforeUpdate() method.
	}

	/**
	 * Show / Hide edit button
	 *
	 * @return boolean
	 */
	public function showEditButton()
	{
		// TODO: Implement showEditButton() method.
	}

	protected function beforeCreate(Model $model, View $view)
	{
		// TODO: Change the autogenerated stub
	}


}