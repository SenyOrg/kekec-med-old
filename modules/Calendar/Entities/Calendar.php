<?php namespace KekecMed\Calendar\Entities;
   
use Illuminate\Database\Eloquent\Model;

/**
 * Class Calendar
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class Calendar extends Model {

    /**
     * Fillable attributes
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'color',
        'creator_id',
        'shared',
        'description',
        'scopes'
    ];

    /**
     * Check if
     * 
     * @return bool
     */
    public function isShared() {
        return (bool)$this->shared;
    }

    /**
     * Get creator / owner of calendar
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator() {
        return $this->belongsTo(\App\User::class, 'creator_id');
    }

    /**
     * Get events of calendar
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events() {
        return $this->hasMany(Event::class);
    }

}