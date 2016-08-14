<?php namespace KekecMed\Queue\Http\Controllers;

use KekecMed\Core\Abstracts\Controllers\AbstractController;
use KekecMed\Queue\Entities\Queue;

/**
 * Class QueueSubscriberController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Http\Controllers
 */
class QueueSubscriberController extends AbstractController
{

    /**
     * Index
     *
     * @return mixed
     */
    public function index()
    {
        return view('queue::subscriber.index');
    }

    /**
     * Get Queue Meta by Id
     *
     * @param $queueId
     *
     * @return mixed
     */
    public function getQueueMeta($queueId)
    {

        return response()->json([
            'queueMeta'  => Queue::find($queueId)->toArray(),
            'queueItems' => Queue::find($queueId)->items()->with('patient')->get()->toArray()
        ]);
    }

    /**
     * Move Queue Item to Outgoing Queue
     *
     * @param $queueItemId
     *
     * @return
     */
    public function moveToOutgoing($queueItemId)
    {
        return redirect('queue/move/' . $queueItemId . '/' . Queue::outgoingQueue()->id);
    }

    /**
     * Move Queue Item to Ingoing Queue
     *
     * @param $queueItemId
     *
     * @return
     */
    public function moveToIngoing($queueItemId)
    {
        return redirect('queue/move/' . $queueItemId . '/' . Queue::ingoingQueue()->id);
    }
}