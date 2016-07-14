<?php namespace KekecMed\Event\Entities;

use App\User;
use KekecMed\Calendar\Entities\Calendar;
use KekecMed\Consultation\Entities\Consultation;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\Presentable;
use KekecMed\Core\Abstracts\Models\PresentableModel;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Abstracts\Models\Relational;
use KekecMed\Core\Abstracts\Models\RelationalMeta;
use KekecMed\Core\Abstracts\Models\RelationalModel;
use KekecMed\Event\Entities\Presenters\EventPresenter;
use KekecMed\Patient\Entities\Patient;

/**
 * Class Event
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Event\Entities
 */
class Event extends AbstractModel implements Relational, Presentable
{
    use RelationalModel, PresentableModel;

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
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    /**
     * Get event type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    /**
     * Get creator of event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
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
     * Get current status of event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(EventStatus::class, 'event_status_id');
    }

    /**
     * Get participants of event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants()
    {
        return $this->hasMany(EventParticipant::class);
    }

    /**
     * Get relational Meta
     *
     * @return array
     */
    public function getRelationalMeta()
    {
        return [
            new RelationalMeta('participants', 'participants', 'participant_id', 'delete'),
        ];
    }

    /**
     * Get related consultations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    /**
     * Get Presenter Class
     *
     * @return AbstractPresenter
     */
    public function getPresenterClass()
    {
        return EventPresenter::class;
    }
}