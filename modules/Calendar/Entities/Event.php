<?php namespace KekecMed\Calendar\Entities;
   
use App\User;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Patient\Entities\Patient;

/**
 * Class Event
 * -----------------------------
 * 
 * -----------------------------
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class Event extends Model {

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'calendar_id',
        'event_type_id',
        'creator_id',
        'patient_id',
        'start',
        'end',
        'event_status_id',
        'description'
    ];

    /**
     * Get related calendar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calendar() {
        return $this->belongsTo(Calendar::class);
    }

    /**
     * Get event type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type() {
        return $this->belongsTo(EventType::class);
    }

    /**
     * Get creator of event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get related patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get current status of event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status() {
        return $this->belongsTo(EventStatus::class);
    }

    /**
     * Get participants of event
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants() {
        return $this->hasMany(EventParticipant::class);
    }

}