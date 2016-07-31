<?php namespace KekecMed\Queue\Entities;

use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Event\Entities\Event;
use KekecMed\Patient\Entities\Patient;

/**
 * Class QueueItem
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Queue\Entities
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class QueueItem extends AbstractModel
{

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'patient_id',
        'queue_id',
        'start',
        'end',
        'status'
    ];

    /**
     * Get related event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get related patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get related queue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function queue()
    {
        return $this->belongsTo(\Queue::class);
    }
}