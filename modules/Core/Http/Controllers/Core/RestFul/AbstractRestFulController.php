<?php namespace KekecMed\Core\Http\Controllers\Core\RestFul;

use GuzzleHttp\Psr7\Request;
use KekecMed\Core\Http\Controllers\Core\AbstractRestFulBlueprintController;
use KekecMed\Core\Http\Controllers\Core\Traits\DataTable;
use KekecMed\Core\Http\Controllers\Core\Traits\ValidatableRest;
use KekecMed\Theme\Component\ViewComponent;

/**
 * Class AbstractRestFulController
 *
 * @package KekecMed\Core\Http\Controllers\Core\RestFul
 */
abstract class AbstractRestFulController extends AbstractRestFulBlueprintController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DataTable routine
        if ($this instanceof DataTable) {
            // Set dataTable instance in ViewComponent
            ViewComponent::getInstance()->dataTable($this->getDataTable());

            return $this->getDataTable()->render($this->getDataTableTemplatePath());
        } else {
            $data = $this->getIndexViewData();

            return $this->getIndexView($data);
        }
    }

    /**
     * Get View Data for index();
     *
     * @return array
     */
    protected function getIndexViewData()
    {
        return [];
    }

    /**
     * Get View for index()
     *
     * @return mixed
     */
    protected function getIndexView(array $data)
    {
        return view($this->getIndexViewPath(), $data);
    }

    /**
     * Get ViewPath for index()
     *
     * @return string
     */
    abstract protected function getIndexViewPath();

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get View Data
        $data = $this->getCreateViewData();

        // Return View
        return $this->getCreatView($data);
    }

    /**
     * Collects data for create view
     *
     * @return array
     */
    protected function getCreateViewData()
    {
        return [
            'create' => true,
            'model'  => $this->getCreateModel()
        ];
    }

    /**
     * Get model for create()
     *
     * @return Model
     */
    public function getCreateModel()
    {
        return $this->getModelInstance();
    }

    /**
     * Get model instance
     *
     * @return Model
     */
    protected function getModelInstance()
    {
        $class = $this->getModelClass();

        return new $class();
    }

    /**
     * Get model class
     *
     * @return Model::class
     */
    abstract protected function getModelClass();

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request
        if ($this instanceof ValidatableRest && $this->validateOnStore()) {
            $this->validateRequest($request, $this->getValidationRules());
        }

        // Get form data
        $data = $this->getStoreModelData();

        // Create model
        $model = $this->storeModel($data);

        // Redirect request
        return $this->redirectAfterStore($model);
    }

    public function getStoreModelData(Request $request)
    {
        return $this->getDataStore($request);
    }

    /**
     * Get form data for store() and update()
     * to create a new model
     *
     * @param Request $request
     *
     * @return array
     */
    protected function getDataStore(Request $request)
    {
        return $request->toArray();
    }

    /**
     * Creates a new model
     *
     * @param $data
     *
     * @return static
     */
    protected function storeModel($data)
    {
        // Get model
        $class = $this->getStoreModel();

        // Create a new model
        return $class::create($data);
    }

    /**
     * Get model for store()
     *
     * @return Model
     */
    public function getStoreModel()
    {
        return $this->getModelClass();
    }

    /**
     * Redirects after store() procedure()
     *
     * @param Model $model
     *
     * @return mixed
     */
    protected function redirectAfterStore(Model $model)
    {
        return $this->redirectToRoute($this->redirectAfterStoreRoute(), $model->id);
    }

    /**
     * Route to redirect after store procedure
     *
     * @return string
     */
    abstract protected function redirectAfterStoreRoute();

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get View Data
        $data = $this->getShowViewData($id);

        // Return view
        return $this->getShowView($data);
    }

    /**
     * Get View Data for show()
     */
    protected function getShowViewData($id)
    {
        return [
            'model' => $this->getShowModel($id)
        ];
    }

    /**
     * Get model instance for show()
     *
     * @return Model
     */
    protected function getShowModel($id)
    {
        // Get model
        $class = $this->getModelClass();

        return $class::findOrFail($id);
    }

    /**
     * Get View for show()
     *
     * @param Model $model
     *
     * @return View
     */
    public function getShowView(array $viewData)
    {
        return $this->createView($this->getShowViewPath(), $viewData);
    }

    /**
     * Get ViewPath for show()
     *
     * @return string
     */
    abstract protected function getShowViewPath();

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get View Data
        $data = $this->getEditViewData($id);

        // Return View
        return $this->getEditView($data);
    }

    protected function getEditViewData($id)
    {
        return [
            'model' => $this->getEditModel($id)
        ];
    }

    /**
     * Get model for edit()
     *
     * @param $id
     *
     * @return Model
     */
    protected function getEditModel($id)
    {
        return $this->getShowModel($id);
    }

    protected function getEditView(array $data)
    {
        return $this->createView($this->getEditViewPath(), $data);
    }

    /**
     * Get Viewpath for edit()
     *
     * @return string
     */
    abstract protected function getEditViewPath();

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate Request
        if ($this instanceof ValidatableRest && $this->validateOnUpdate()) {
            $this->validateRequest($request, $this->getValidationRules());
        }

        // Get form data
        $data = $this->getUpdateModelData($request, $id);

        // Create model
        $model = $this->updateModel($id, $data);

        // Redirect request
        return $this->redirectAfterStore($model);
    }

    /**
     * Returns data for updating a model
     *
     * @param Request $request
     * @param         $id
     *
     * @return array
     */
    protected function getUpdateModelData(Request $request, $id)
    {
        return $this->getDataStore($request);
    }

    /**
     * Updates a given model
     *
     * @param       $id
     * @param array $data
     */
    protected function updateModel($id, array $data)
    {
        $modelInstance = $this->getUpdateModel($id);

        return $modelInstance->update($data);
    }

    protected function getUpdateModel($id)
    {
        $class = $this->getModelClass();

        return $class::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->destroyModel($id);

        return $this->redirectAfterDestroy($id);
    }

    /**
     * Destroy a model resource
     *
     * @param $id
     */
    protected function destroyModel($id)
    {
        $modelClass = $this->getDestroyModel($id);

        $modelClass::destroy($id);
    }

    protected function getDestroyModel()
    {
        return $this->getModelClass();
    }

    /**
     * Redirect after destroy()
     *
     * @param $id
     *
     * @return mixed
     */
    protected function redirectAfterDestroy($id)
    {
        return $this->redirectToRoute($this->redirectAfterDestroyRoute());
    }

    /**
     * Redirect route after destroy
     *
     * @return string
     */
    abstract protected function redirectAfterDestroyRoute();

    /**
     * Returns View for create()
     *
     * @param array $data
     *
     * @return View
     */
    protected function getCreateView(array $data)
    {
        return $this->createView($this->getCreateViewPath(), $data);
    }

    /**
     * Get ViewPath for create()
     *
     * @return string
     */
    abstract protected function getCreateViewPath();

    /**
     * Redirection after update()
     *
     * @param $id
     *
     * @return mixed
     */
    protected function redirectAfterUpdate(Model $model)
    {
        return $this->redirectToRoute($this->redirectAfterUpdateRoute(), $model->id);
    }

    /**
     * Route to redirect after update()
     *
     * @return string
     */
    abstract protected function redirectAfterUpdateRoute();
}