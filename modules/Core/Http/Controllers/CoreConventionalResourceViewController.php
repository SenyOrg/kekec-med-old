<?php

namespace KekecMed\Core\Http\Controllers;

/**
 * Class CoreConventionalResourceViewController
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\Http\Controllers
 * @author Selcuk Kekec <senycorp@googlemail.com>
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
        return [$this->getDeleteButtonRouteName(), request()->id];
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


}