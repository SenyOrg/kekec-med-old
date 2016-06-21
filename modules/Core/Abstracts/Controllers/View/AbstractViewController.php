<?php namespace KekecMed\Core\Abstracts\Controllers\View;

use KekecMed\Core\Abstracts\Controllers\RestFul\AbstractRestFulGenericController;
use KekecMed\Core\Abstracts\Controllers\Traits\Viewable;

/**
 * Class AbstractRestFulController
 *
 * @package KekecMed\Core\Abstracts\Controllers\RestFul
 */
abstract class AbstractViewController extends AbstractRestFulGenericController
    implements Viewable
{
    /**
     * Show / Hide edit button
     *
     * @return boolean
     */
    public function isEditVisibile()
    {
        return true;
    }

    /**
     * Show / Hide delete button
     *
     * @return boolean
     */
    public function isCreateVisibile()
    {
        return true;
    }

    /**
     * Show / Hide edit button
     *
     * @return boolean
     */
    public function isUpdateVisibile()
    {
        return true;
    }

    /**
     * Show / Hide store button
     *
     * @return boolean
     */
    public function isStoreVisibile()
    {
        return true;
    }

    /**
     * Show / Hide edit button
     *
     * @return boolean
     */
    public function isDeleteVisibile()
    {
        return true;
    }

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
     * Route name for adding to edit button
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
     * Route name for adding to delete button
     *
     * @return mixed
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
     * Route name for adding to create button
     *
     * @return string
     */
    public function getCreateButtonRouteName()
    {
        return $this->getRouteName('create');
    }

    /**
     * Get route for store button
     *
     * @return string
     */
    public function getStoreButtonRoute()
    {
        return $this->getStoreButtonRouteName();
    }

    /**
     * Route name for adding to store button
     *
     * @return string
     */
    public function getStoreButtonRouteName()
    {
        return $this->getRouteName('store');
    }

    /**
     * @return mixed
     */
    public function getUpdateButtonRoute()
    {
        return $this->getUpdateButtonRouteName();
    }

    /**
     * Route name for adding to save button
     *
     * @return string
     */
    public function getUpdateButtonRouteName()
    {
        return $this->getRouteName('update');
    }
}