<?php namespace KekecMed\Core\Abstracts\Controllers\Traits;

/**
 * Interface Viewable
 *
 * @package KekecMed\Core\Abstracts\Controllers\Traits
 */
interface Viewable
{
    /**
     * Show / Hide edit button
     *
     * @return boolean
     */
    public function isEditVisibile();

    /**
     * Show / Hide delete button
     *
     * @return boolean
     */
    public function isCreateVisibile();

    /**
     * Show / Hide edit button
     *
     * @return boolean
     */
    public function isUpdateVisibile();

    /**
     * Show / Hide store button
     *
     * @return boolean
     */
    public function isStoreVisibile();

    /**
     * Show / Hide edit button
     *
     * @return boolean
     */
    public function isDeleteVisibile();

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

    /**
     * Route name for adding to store button
     *
     * @return string
     */
    public function getStoreButtonRouteName();

    /**
     * Route name for adding to save button
     *
     * @return string
     */
    public function getUpdateButtonRouteName();
}