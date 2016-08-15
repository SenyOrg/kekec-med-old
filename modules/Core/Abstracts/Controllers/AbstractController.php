<?php namespace KekecMed\Core\Abstracts\Controllers;

use Illuminate\Http\Request;
use KekecMed\Core\Abstracts\Controllers\Traits\Headful;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\Mediable\Mediable;
use KekecMed\Core\Abstracts\Models\Mediable\MediableModel;
use KekecMed\Theme\Component\ViewComponent;
use Pingpong\Modules\Routing\Controller;

/**
 * Class AbstractController
 *
 * @package KekecMed\Core\Abstracts\Controllers
 */
abstract class AbstractController extends Controller
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request = null;

    /**
     * AbstractController constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        // Set controller in ViewComponent
        ViewComponent::getInstance()->controller($this);

        // Store Request
        $this->setRequest($request);

        // Set View (Sub-)Header
        if ($this instanceof Headful) {
            $this->getViewComponent()->setPageHeader($this->getPageHeader());
            $this->getViewComponent()->setPageSubHeader($this->getPageSubHeader());
        }
    }

    /**
     * Get ViewComponent
     *
     * @return ViewComponent|null
     */
    protected function getViewComponent()
    {
        return ViewComponent::getInstance();
    }

    /**
     * Get request
     *
     * @return \Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set request
     *
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Create a view with provided data
     *
     * @param       $view
     * @param array $data
     */
    protected function createView($view, array $data = [])
    {
        return view($view, $data);
    }

    /**
     * Redirect request to another Route
     *
     * @param $route
     * @param $data
     *
     * @return mixed
     */
    protected function redirectToRoute($route, $data = null)
    {
        if ($data) {
            return redirect()->route($route, $data);
        }

        return redirect()->route($route);
    }

    /**
     * Validates Request
     *
     * @param Request $request
     * @param array   $validationRules
     */
    protected function validateRequest(Request $request, array $validationRules)
    {
        $this->validate($request, $validationRules);
    }

    /**
     * Handle required Model Hooks
     *
     * This method should hold all routines related to
     * models and their handling. Please prevent mixing
     * model handling into common request.
     *
     * @param AbstractModel $model
     */
    protected function handleModelHooks(AbstractModel $model)
    {
        // MediableModel
        if ($model instanceof Mediable) {
            /** @var MediableModel $model */
            $model->callMediableUpdate($model);
        }
    }
}