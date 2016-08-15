<?php namespace KekecMed\Core\Abstracts\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;


/**
 * Class AbstractEvent
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Events
 */
abstract class AbstractEvent extends Event
{
    use SerializesModels;
}