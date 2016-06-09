<?php namespace KekecMed\Calendar\Entities;
   
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventStatus
 * -----------------------------
 * 
 * -----------------------------
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class EventStatus extends Model {

    protected $fillable = [
        'title',
        'color'
    ];

    /**
     * Get events by status
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events() {
        return $this->hasMany(Event::class);
    }
}