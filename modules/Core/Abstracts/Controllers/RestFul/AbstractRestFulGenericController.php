<?php namespace KekecMed\Core\Abstracts\Controllers\RestFul;

/**
 * Class AbstractRestFulController
 *
 * @package KekecMed\Core\Abstracts\Controllers\RestFul
 */
abstract class AbstractRestFulGenericController extends AbstractRestFulController
{
    /**
     * Get ViewPath for index()
     *
     * @return string
     */
    protected function getIndexViewPath()
    {
        return $this->getViewPath('index');
    }

    /**
     * Get path to view
     *
     * @param $view
     *
     * @return string
     */
    public function getViewPath($view)
    {
        return $this->getIdentifier() . '::' . $view;
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    abstract protected function getIdentifier();

    /**
     * Get ViewPath for create()
     *
     * @return string
     */
    protected function getCreateViewPath()
    {
        return $this->getViewPath('edit');
    }

    /**
     * Route to redirect after store procedure
     *
     * @return string
     */
    protected function redirectAfterStoreRoute()
    {
        return $this->getRouteName('show');
    }

    /**
     * Get route name
     *
     * @param $route
     *
     * @return string
     */
    public function getRouteName($route)
    {
        return $this->getIdentifier() . '.' . $route;
    }

    /**
     * Get ViewPath for show()
     *
     * @return string
     */
    protected function getShowViewPath()
    {
        return $this->getViewPath('show');
    }

    /**
     * Get Viewpath for edit()
     *
     * @return string
     */
    protected function getEditViewPath()
    {
        return $this->getViewPath('edit');
    }

    /**
     * Route to redirect after update()
     *
     * @return string
     */
    protected function redirectAfterUpdateRoute()
    {
        return $this->getRouteName('show');
    }

    /**
     * Redirect route after destroy
     *
     * @return string
     */
    protected function redirectAfterDestroyRoute()
    {
        return $this->getRouteName('index');
    }
}