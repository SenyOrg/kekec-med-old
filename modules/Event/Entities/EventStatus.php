<?php namespace KekecMed\Event\Entities;
   
use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Event\Entities\Event;

/**
 * Class EventStatus
 * -----------------------------
 * 
 * -----------------------------
 * @package KekecMed\Calendar\Entities
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class EventStatus extends Model implements Dialogable{

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

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        $arr = [];

        self::select(['id', 'title', 'color'])->orderBy('title')->each(function($u) use(&$arr) {
            //$arr[$u->id] = '<span class="label label-default" style="background-color: '.$u->color.'!important">COLOR</span> '. $u->title;
            $arr[$u->id] = $u->title;
        });

        return $arr;
    }
}