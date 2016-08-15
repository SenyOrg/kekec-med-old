<?php namespace KekecMed\Calendar\Entities;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Event\Entities\Event;

/**
 * Class Calendar
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Calendar\Entities
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class Calendar extends Model implements Dialogable
{

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
     * Check if calendar is shared
     *
     * @return bool
     */
    public function isShared()
    {
        return (bool)$this->shared;
    }

    /**
     * Get creator / owner of calendar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(\App\User::class, 'creator_id');
    }

    /**
     * Get events of calendar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
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
}