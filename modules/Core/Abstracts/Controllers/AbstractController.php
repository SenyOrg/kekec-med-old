<?php namespace KekecMed\Core\Abstracts\Controllers;

use Illuminate\Http\Request;
use KekecMed\Core\Abstracts\Controllers\Traits\Headful;
use KekecMed\Theme\Component\ViewComponent;
use Pingpong\Modules\Routing\Controller;

/**
 * Class AbstractController
 *
 * @package KekecMed\ore\Abstracts\Controllers
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

        // Set Header
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
}