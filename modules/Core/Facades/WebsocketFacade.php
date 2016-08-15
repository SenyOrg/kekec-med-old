<?php namespace KekecMed\Core\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class WebsocketFacade
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Facades
 */
class WebsocketFacade extends Facade
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
        return 'kekecmed.service.websocket.client';
    }
}
