<?php namespace KekecMed\Queue\Events;

use KekecMed\Core\Abstracts\Events\AbstractWebsocketEvent;
use KekecMed\Event\Entities\Event;

/**
 * Class QueueItemDeleted
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Events
 */
class QueueItemDeleted extends AbstractWebsocketEvent
{

    public function __construct(Event $model)
    {
        $this->setModel($model);
    }

    /**
     * @param Event $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Get topic for websocket request
     *
     * @return string
     */
    public function getTopic()
    {
        return 'kekecmed.queue.item.deleted';
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
        return $this->getModel()->toArray();
    }

    /**
     * @return Event
     */
    public function getModel()
    {
        return $this->model;
    }
}