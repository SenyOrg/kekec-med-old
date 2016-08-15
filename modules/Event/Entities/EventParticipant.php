<?php namespace KekecMed\Event\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventParticipant
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Calendar\Entities
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class EventParticipant extends Model
{

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'participant_id'
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
     * Get participated user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participant()
    {
        return $this->belongsTo(User::class);
    }

}