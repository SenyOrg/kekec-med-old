<?php namespace KekecMed\Queue\Events;

use KekecMed\Core\Abstracts\Events\AbstractWebsocketEvent;

/**
 * Class QueueItemMoved
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Events
 */
class QueueItemMoved extends AbstractWebsocketEvent
{

    /**
     * Get topic for websocket request
     *
     * @return string
     */
    public function getTopic()
    {
        return 'kekecmed.queue.item.moved';
    }

    /**
     * Get callback for successfully finished requests
     *
     * @return callable
     */
    public function getSuccessCallback()
    {
        return function ($session) {
            /**
             * Nothing to handle here
             */
        };
    }

    /**
     * Get callback for unfinished requests
     *
     * @return callable
     */
    public function getFinishCallback()
    {
        return function ($errorData, $session) {
            /**
             * Nothing to handle here
             */
        };
    }

    /**
     * Get data for request
     *
     * @return array
     */
    public function getData()
    {
        $this->getModel()->load(['patient', 'queue']);

        return $this->getModel()->toArray();
    }
}