<?php

namespace KekecMed\Core\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class CoreResourceController
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\Http\Controllers
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
abstract class CoreResourceController extends AbstractCoreResourceController
{

    /**
     * Get model class
     *
     * @return Model::class
     */
    abstract protected function getModelClass();

    /**
     * Get model instance
     *
     * @return Model
     */
    protected function getModel()
    {

        $class = $this->getModelClass();
        return new $class();
    }

    /**
     * Executed before index
     *
     * @return mixed
     */
    abstract protected function beforeIndex();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Execute Callback
        $this->beforeIndex();

        // DataTable routine
        if ($this instanceof CoreDataTableController)
            return $this->getDataTable()->render($this->getDataTableTemplatePath());
        else
            return $this->getIndexView();
    }

    /**
     * Get ViewPath for index()
     *
     * @return string
     */
    abstract protected function getIndexViewPath();

    protected function getIndexView()
    {
        return view($this->getIndexView());
    }

    /**
     * Execute before create()
     *
     * @param Model $model
     * @param View $view
     * @return mixed
     */
    abstract protected function beforeCreate(Model $model, View $view);

    /**
     * Execute after create()
     *
     * @return mixed
     */
    abstract protected function afterCreate();

    /**
     * Get ViewPath for create()
     *
     * @return string
     */
    abstract protected function getCreateViewPath();

    /**
     * Returns View for create()
     *
     * @param array $data
     * @return View
     */
    protected function getCreateView(array $data)
    {
        return view($this->getCreateViewPath(), $data);
    }

    /**
     * Get model for create()
     *
     * @return Model
     */
    public function getModelForCreate()
    {
        return $this->getModel();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get model
        $model = $this->getModelForCreate();

        // Get view
        $view = $this->getCreateView(['create' => true, 'model' => $model]);

        // Execute callback
        $this->beforeCreate($model, $view);

        return $view;
    }

    /**
     * Get form data for store() and update()
     * to create a new model
     *
     * @param Request $request
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
     * @return static
     */
    protected function createModel($data)
    {
        // Get model
        $class = $this->getModelClass();

        // Create a new model
        return $class::create($data);
    }

    /**
     * Execute before store()
     *
     * @param array $data
     * @return mixed
     */
    abstract protected function beforeStore(array $data);

    /**
     * Execute after store()
     *
     * @param Model $model
     * @return mixed
     */
    abstract protected function afterStore(Model $model);

    /**
     * Route to redirect after store procedure
     *
     * @return string
     */
    abstract protected function redirectAfterStoreRoute();

    /**
     * Redirects after store() procedure()
     *
     * @param Model $model
     * @return mixed
     */
    protected function redirectAfterStore(Model $model)
    {
        return redirect()->route($this->redirectAfterStoreRoute(), $model->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request
        if ($this instanceof CoreValidationController) {
            $this->validate($request, $this->getValidationRules());
        }

        // Get form data
        $data = $this->getDataStore($request);

        // Before callback
        $this->beforeStore($data);

        // Create model
        $model = $this->createModel($data);

        // After callback
        $this->afterStore($model);

        // Redirect request
        return $this->redirectAfterStore($model);
    }

    /**
     * Get ViewPath for show()
     *
     * @return string
     */
    abstract protected function getShowViewPath();

    /**
     * Get View for show()
     *
     * @param Model $model
     * @return View
     */
    public function getShowView(Model $model)
    {
        return view($this->getShowViewPath(), ['model' => $model]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get model
        $class = $this->getModelClass();

        // Return view
        return $this->getShowView($class::findOrFail($id));
    }

    /**
     * Get Viewpath for edit()
     *
     * @return string
     */
    abstract protected function getEditViewPath();

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get model
        $class = $this->getModelClass();
        $model = $class::findOrFail($id);

        // Return
        return view($this->getEditViewPath(), ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this instanceof CoreValidationController) {
            $this->validate($request, $this->getValidationRules());
        }

        $data = $this->getDataStore($request);

        $this->beforeUpdate($id, $data);
        $this->updateModel($id, $data);

        return $this->redirectAfterUpdate($id);
    }

    /**
     * Before update()
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    abstract protected function beforeUpdate($id, $data);

    /**
     * Route to redirect after update()
     *
     * @return string
     */
    abstract protected function redirectAfterUpdateRoute();

    /**
     * Redirection after update()
     *
     * @param $id
     * @return mixed
     */
    protected function redirectAfterUpdate($id)
    {
        return redirect()->route($this->redirectAfterUpdateRoute(), $id);
    }

    /**
     * Updates a given model
     *
     * @param $id
     * @param array $data
     */
    protected function updateModel($id, array $data)
    {
        $class = $this->getModelClass();

        $class::findOrFail($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->destroyModel($id);
        return $this->redirectAfterDestroy($id);
    }

    /**
     * Redirect after destroy()
     *
     * @param $id
     * @return mixed
     */
    protected function redirectAfterDestroy($id)
    {
        return redirect()->route($this->redirectAfterDestroyRoute());
    }

    /**
     * Redirect route after destroy
     *
     * @return string
     */
    abstract protected function redirectAfterDestroyRoute();

    /**
     * Destroy a model resource
     *
     * @param $id
     */
    protected function destroyModel($id)
    {
        $class = $this->getModelClass();
        $class::destroy($id);
    }
}