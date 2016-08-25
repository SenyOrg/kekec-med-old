<?php namespace KekecMed\Messenger\Events;

use KekecMed\Core\Abstracts\Events\AbstractWebsocketEvent;
use KekecMed\Messenger\Entities\ChatMessage;

/**
 * Class MessengerChatMessageCreated
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Events
 */
class MessengerChatMessageCreated extends AbstractWebsocketEvent
{
    /**
     * QueueItem Model
     *
     * @var ChatMessage
     */
    protected $model;

    /**
     * AbstractWebsocketEvent constructor.
     *
     * @param ChatMessage $model
     */
    public function __construct(ChatMessage $model)
    {
        // Set provided model
        $model->load(['author', 'chat']);
        $this->setModel($model);
    }
    
    /**
     * Get topic for websocket request
     *
     * @return string
     */
    public function getTopic()
    {
        return 'kekecmed.messenger.chat.message.created';
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
}