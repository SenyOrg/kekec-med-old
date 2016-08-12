<?php namespace KekecMed\Queue\Subscribers;

use KekecMed\Core\Abstracts\Events\AbstractWebsocketEvent;
use KekecMed\Queue\Events\QueueItemChanged;
use KekecMed\Queue\Events\QueueItemCreated;
use KekecMed\Queue\Events\QueueItemDeleted;
use KekecMed\Queue\Events\QueueItemMoved;

/**
 * Class WebsocketSubscriber
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Subscribers
 */
class WebsocketSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            QueueItemCreated::class,
            self::class . '@handle'
        );

        $events->listen(
            QueueItemDeleted::class,
            self::class . '@handle'
        );

        $events->listen(
            QueueItemMoved::class,
            self::class . '@handle'
        );

        $events->listen(
            QueueItemChanged::class,
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