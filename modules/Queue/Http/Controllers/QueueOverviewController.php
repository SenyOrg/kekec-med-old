<?php namespace KekecMed\Queue\Http\Controllers;

use KekecMed\Core\Abstracts\Controllers\AbstractController;
use KekecMed\Event\Entities\Event;
use KekecMed\Queue\Entities\Queue;
use KekecMed\Queue\Entities\QueueItem;
use KekecMed\Queue\Events\QueueItemCreated;
use KekecMed\Queue\Events\QueueItemDeleted;
use KekecMed\Queue\Events\QueueItemMoved;

/**
 * Class QueueOverviewController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Http\Controllers
 */
class QueueOverviewController extends AbstractController
{

    /**
     * Index
     *
     * @return mixed
     */
    public function index()
    {
        /**
         * @todo: Move this to another place
         */
        $eventIds = collect(\DB::select('select events.id from events 
              LEFT JOIN queue_items ON queue_items.event_id = events.id
              INNER JOIN patients ON patients.id = events.patient_id
              where queue_items.id IS NULL', []))->pluck('id')->toArray();

        return view('queue::overview.index', [
            'queues' => Queue::where('title', '!=', 'Ingoing')->where('title', '!=', 'Outgoing')->get(),
            'events' => Event::whereIn('id', $eventIds)->with('patient')->get()
        ]);
    }

    /**
     * Create new Queue Item
     *
     * @param $eventId
     *
     * @return mixed
     */
    public function createQueueItem($eventId)
    {
        $eventModel = Event::findOrFail($eventId);
        $queueItemModel = new QueueItem([
            'event_id'   => $eventModel->id,
            'patient_id' => $eventModel->patient_id,
            'queue_id'   => Queue::where('title', '=', 'Ingoing')->first()->id
        ]);

        $queueItemModel->save();
        $queueItemModel->load('patient');

        \Event::fire(new QueueItemCreated($queueItemModel));

        return response()->json([
            'success' => true,
            'item'    => $queueItemModel->toArray()
        ]);
    }

    /**
     * Delete Queue Item
     *
     * @param $queueItemId
     *
     * @return mixed
     */
    public function deleteQueueItem($queueItemId)
    {
        $queueItemModel = QueueItem::findOrFail($queueItemId);
        $eventModel = Event::findOrFail($queueItemModel->event_id);
        $eventModel->load('patient');
        $eventModel->queueItemId = $queueItemId;

        if ($queueItemModel->delete()) {
            \Event::fire(new QueueItemDeleted($eventModel));

            return response()->json([
                'success'       => true,
                'event'         => $eventModel,
                'queue_item_id' => $queueItemId
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    /**
     * Move Queue Item to another Queue
     *
     * @param $queueItemId
     * @param $queueId
     */
    public function moveQueueItem($queueItemId, $queueId)
    {
        $queueItemModel = QueueItem::findOrFail($queueItemId);
        $queueModel = Queue::findOrFail($queueId);
        $queueItemModel->queue_id = $queueId;

        if ($queueItemModel->save()) {
            \Event::fire(new QueueItemMoved($queueItemModel));

            return response()->json([
                'success'   => true,
                'queueItem' => $queueItemModel->toArray()
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}