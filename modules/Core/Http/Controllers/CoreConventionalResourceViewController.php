<?php

namespace KekecMed\Core\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

/**
 * Class CoreConventionalResourceViewController
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\Http\Controllers
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
abstract class CoreConventionalResourceViewController extends CoreConventionalResourceController
    implements CoreResourceViewController
{
    /**
     * Get route for edit button
     *
     * @return route
     */
    public function getEditButtonRoute()
    {
        return route($this->getEditButtonRouteName(), \Route::getCurrentRoute()->getParameter($this->getIdentifier()));
    }

    /**
     * Get named route for edit button
     *
     * @return string
     */
    public function getEditButtonRouteName()
    {
        return $this->getRouteName('edit');
    }

    /**
     * Get route for delete button
     *
     * @return array
     */
    public function getDeleteButtonRoute()
    {
        return [$this->getDeleteButtonRouteName(), \Route::getCurrentRoute()->getParameter($this->getIdentifier())];
    }

    /**
     * Get named route for delete button
     *
     * @return string
     */
    public function getDeleteButtonRouteName()
    {
        return $this->getRouteName('destroy');
    }

    /**
     * Get route for edit button
     *
     * @return route
     */
    public function getCreateButtonRoute()
    {
        return route($this->getCreateButtonRouteName(),
            \Route::getCurrentRoute()->getParameter($this->getIdentifier()));
    }

    /**
     * Get named route for create button
     *
     * @return string
     */
    public function getCreateButtonRouteName()
    {
        return $this->getRouteName('create');
    }

    public function getStoreButtonRouteName()
    {
        return $this->getRouteName('store');
    }

    public function getStoreButtonRoute()
    {
        return $this->getStoreButtonRouteName();
    }

    public function getUpdateButtonRouteName()
    {
        return $this->getRouteName('update');
    }

    public function getUpdateButtonRoute()
    {
        return $this->getUpdateButtonRouteName();
    }

    /**
     * Execute before store()
     *
     * @param array $data
     *
     * @return mixed
     */
    protected function beforeStore(array $data)
    {
        // TODO
    }

    /**
     * Execute after store()
     *
     * @param Model $model
     *
     * @return mixed
     */
    protected function afterStore(Model $model)
    {
        //TODO
    }

    /**
     * Executed before index
     *
     * @return mixed
     */
    protected function beforeIndex()
    {
        // Implement this in sub class
        //throw new \Exception(__METHOD__);
    }

    /**
     * Execute before create()
     *
     * @param Model $model
     * @param View  $view
     *
     * @return mixed
     */
    protected function beforeCreate(Model $model, View $view)
    {
        // Implement this in sub class
    }

    /**
     * Execute after create()
     *
     * @return mixed
     */
    protected function afterCreate()
    {
        // Implement this in sub class
    }

}