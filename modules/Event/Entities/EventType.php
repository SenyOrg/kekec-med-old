<?php namespace KekecMed\Event\Entities;
   
use Illuminate\Database\Eloquent\Model;
use KekecMed\Event\Entities\Event;

/**
 * Class EventType
 * -----------------------------
 * 
 * -----------------------------
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class EventType extends Model {

    protected $fillable = [
        'title',
        'color',
        'description'
    ];

    /**
     * Get events by type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events() {
        return $this->hasMany(Event::class);
    }
}