<?php namespace KekecMed\Messenger\Subscribers;

use KekecMed\Core\Abstracts\Events\AbstractWebsocketEvent;
use KekecMed\Core\Abstracts\Subscribers\AbstractSubscriber;
use KekecMed\Messenger\Events\MessengerChatMessageCreated;
use KekecMed\Queue\Events\QueueItemChanged;
use KekecMed\Queue\Events\QueueItemCreated;
use KekecMed\Queue\Events\QueueItemDeleted;
use KekecMed\Queue\Events\QueueItemMoved;

/**
 * Class WebsocketSubscriber
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Subscribers
 */
class WebsocketSubscriber extends AbstractSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            MessengerChatMessageCreated::class,
            self::class . '@handle'
        );
    }

    /**
     * Handle websocket events
     *
     * @param AbstractWebsocketEvent $event
     */
    public function handle(AbstractWebsocketEvent $event)
    {
        // Send websocket request
        \WebsocketClient::send(
            $event->getTopic(),
            $event->getData(),
            $event->getSuccessCallback(),
            $event->getFinishCallback());
    }
}