<?php namespace KekecMed\Core\Abstracts\Events;

use Illuminate\Queue\SerializesModels;
use KekecMed\Queue\Entities\QueueItem;

/**
 * Class AbstractWebsocketEvent
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Events
 */
abstract class AbstractWebsocketEvent extends AbstractEvent
{
    use SerializesModels;

    /**
     * QueueItem Model
     *
     * @var QueueItem
     */
    protected $model;

    /**
     * AbstractWebsocketEvent constructor.
     *
     * @param QueueItem $model
     */
    public function __construct(QueueItem $model)
    {
        // Set provided model
        $this->setModel($model);
    }

    /**
     * Get topic for websocket request
     *
     * @return string
     */
    abstract public function getTopic();

    /**
     * Get callback for successfully finished requests
     *
     * @return callable
     */
    abstract public function getSuccessCallback();

    /**
     * Get callback for unfinished requests
     *
     * @return callable
     */
    abstract public function getFinishCallback();

    /**
     * Get data for request
     *
     * @return array
     */
    abstract public function getData();

    /**
     * @return QueueItem
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param QueueItem $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
}