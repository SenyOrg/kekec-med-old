<?php

namespace KekecMed\Core\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

/**
 * Class CoreConventionalResourceController
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\Http\Controllers
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
abstract class CoreConventionalResourceController extends CoreResourceController
{

    /**
     * Get Module identifier
     *
     * @return string
     */
    abstract protected function getIdentifier();

    /**
     * Get route name
     *
     * @param $route
     * @return string
     */
    public function getRouteName($route)
    {
        return $this->getIdentifier() . '.' . $route;
    }

    /**
     * Get path to view
     *
     * @param $view
     * @return string
     */
    public function getViewPath($view)
    {
        return $this->getIdentifier() . '::' . $view;
    }

    /**
     * Executed before index
     *
     * @return mixed
     */
    protected function beforeIndex()
    {
        // Implement this in sub class
        throw new \Exception(__METHOD__);
    }

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
     * Execute before create()
     *
     * @param Model $model
     * @param View $view
     * @return mixed
     */
    protected function beforeCreate(Model $model, View $view)
    {
        // Implement this in sub class
        throw new \Exception(__METHOD__);
    }

    /**
     * Execute after create()
     *
     * @return mixed
     */
    protected function afterCreate()
    {
        // Implement this in sub class
        throw new \Exception(__METHOD__);
    }

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
     * Execute before store()
     *
     * @param array $data
     * @return mixed
     */
    protected function beforeStore(array $data)
    {
        // Implement this in sub class
        throw new \Exception(__METHOD__);
    }

    /**
     * Execute after store()
     *
     * @param Model $model
     * @return mixed
     */
    protected function afterStore(Model $model)
    {
        // Implement this in sub class 
        throw new \Exception(__METHOD__);
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
     * Before update()
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    protected function beforeUpdate($id, $data)
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