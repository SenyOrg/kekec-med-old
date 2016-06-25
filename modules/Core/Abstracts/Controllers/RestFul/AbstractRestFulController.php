<?php namespace KekecMed\Core\Abstracts\Controllers\RestFul;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\View\View;
use KekecMed\Core\Abstracts\Controllers\AbstractRestFulBlueprintController;
use KekecMed\Core\Abstracts\Controllers\Traits\Breadcrumbful;
use KekecMed\Core\Abstracts\Controllers\Traits\DataTable;
use KekecMed\Core\Abstracts\Controllers\Traits\ValidatableRest;
use KekecMed\Theme\Component\ViewComponent;

/**
 * Class AbstractRestFulController
 *
 * @package KekecMed\Core\Abstracts\Controllers\RestFul
 */
abstract class AbstractRestFulController extends AbstractRestFulBlueprintController
{
    /**
     * AbstractController constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        // Process root node of BreadCrumb
        if ($this instanceof Breadcrumbful) {
            $this->rootBreadcrumb();
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Process index node of BreadCrumb
        if ($this instanceof Breadcrumbful) {
            $this->indexBreadcrumb();
        }

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
     * @param array $data
     *
     * @return View
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
        // Process root node of BreadCrumb
        if ($this instanceof Breadcrumbful) {
            $this->createBreadcrumb();
        }

        // Get View Data
        $data = $this->getCreateViewData();

        // Return View
        return $this->getCreateView($data);
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
        $data = $this->getStoreModelData($request);

        // Create model
        $model = $this->storeModel($data);

        // Redirect request
        return $this->redirectAfterStore($model);
    }

    /**
     * Get prepared data to store
     *
     * @param Request $request
     *
     * @return array
     */
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
     * @return Model
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
        // Process edit node of BreadCrumb
        if ($this instanceof Breadcrumbful) {
            $this->showBreadcrumb($id);
        }

        // Get View Data
        $data = $this->getShowViewData($id);

        // Return view
        return $this->getShowView($data);
    }

    /**
     * Get View Data for show()
     *
     * @param $id
     *
     * @return array
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
     * @param $id
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
     * @param array $viewData
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
        // Process edit node of BreadCrumb
        if ($this instanceof Breadcrumbful) {
            $this->editBreadcrumb($id);
        }

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

    /**
     * Get Edit View
     *
     * @param array $data
     *
     * @return mixed
     */
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
        return $this->redirectAfterUpdate($model);
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
     *
     * @return
     * @throws \Exception
     */
    protected function updateModel($id, array $data)
    {
        $modelInstance = $this->getUpdateModel($id);

        if ($modelInstance->update($data)) {
            return $modelInstance;
        } else {
            throw new \Exception('Unable to update Model');
        }
    }

    protected function getUpdateModel($id)
    {
        $class = $this->getModelClass();

        return $class::findOrFail($id);
    }

    /**
     * Redirection after update()
     *
     * @param Model $model
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

    /**
     * Get Model to delete
     *
     * @param $id
     *
     * @return Model
     */
    protected function getDestroyModel($id)
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
}