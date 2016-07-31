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