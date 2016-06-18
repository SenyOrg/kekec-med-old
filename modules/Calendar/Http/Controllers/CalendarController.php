<?php namespace KekecMed\Calendar\Http\Controllers;

use KekecMed\Calendar\Entities\Calendar;
use KekecMed\Core\Http\Controllers\Core\RestFul\AbstractRestFulGenericController;

class CalendarController extends AbstractRestFulGenericController
{

    /**
     * Get model class
     *
     * @return \KekecMed\Core\Http\Controllers\Core\RestFul\Model::class
     */
    protected function getModelClass()
    {
        return Calendar::class;
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'calendar';
    }
}