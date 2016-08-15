<?php

namespace KekecMed\Core\Entities;

/**
 * Interface Dialogable
 * ----------------------------------
 * Add possibility to convert model
 * to dialogbox by widget.
 * ----------------------------------
 *
 * @package KekecMed\Core\Entities
 */
interface Dialogable
{
    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData();
}