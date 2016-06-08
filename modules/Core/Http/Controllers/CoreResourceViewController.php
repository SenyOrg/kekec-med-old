<?php

namespace KekecMed\Core\Http\Controllers;

/**
 * Interface CoreResourceViewController
 *
 * @package KekecMed\Core\Http\Controllers
 */
interface CoreResourceViewController
{
    /**
     * Show / Hide edit button
     *
     * @return boolean
     */
    public function showEditButton();

    /**
     * Route name for adding to edit button
     *
     * @return string
     */
    public function getEditButtonRouteName();

    /**
     * Route name for adding to delete button
     *
     * @return mixed
     */
    public function getDeleteButtonRouteName();

    /**
     * Route name for adding to create button
     *
     * @return string
     */
    public function getCreateButtonRouteName();
}