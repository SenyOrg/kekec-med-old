<?php namespace KekecMed\Core\Http\Controllers\Core;

use Illuminate\Http\Request;
use KekecMed\Theme\Component\ViewComponent;
use Pingpong\Modules\Routing\Controller;

/**
 * Class AbstractController
 *
 * @package KekecMed\Core\Http\Controllers\Core
 */
abstract class AbstractController extends Controller
{
    /**
     * @var \Request
     */
    protected $request = null;

    /**
     * AbstractController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        // Set controller in ViewComponent
        ViewComponent::getInstance()->controller($this);

        // Store Request
        $this->setRequest($request);
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
     * @param \Request $request
     */
    public function setRequest($request)
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
        return $this->validate($request, $validationRules);
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
}