<?php namespace KekecMed\Queue\Entities;

use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Entities\Dialogable;

/**
 * Class Queue
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Queue\Entities
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class Queue extends AbstractModel implements Dialogable
{

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'multiple',
        'calendars',
        'event_types',
    ];

    /**
     * Get Outgoing Queue
     *
     * @return Queue
     */
    public static function outgoingQueue()
    {
        return self::where('title', 'Outgoing')->first();
    }

    /**
     * Get Ingoing Queue
     *
     * @return Queue
     */
    public static function ingoingQueue()
    {
        return self::where('title', 'Ingoing')->first();
    }

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        $arr = [];

        self::select(['id', 'title'])->orderBy('title')->each(function ($u) use (&$arr) {
            $arr[$u->id] = $u->title;
        });

        return $arr;
    }

    /**
     * Get related queue items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(QueueItem::class);
    }
}