<?php namespace KekecMed\Messenger\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class MessengerFacade
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Facades
 */
class MessengerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'kekecmed.service.messenger';
    }
}
