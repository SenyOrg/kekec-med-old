<?php namespace KekecMed\Queue\Http\Controllers;

use KekecMed\Core\Abstracts\Controllers\AbstractController;

/**
 * Class QueueWaitingRoomController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Http\Controllers
 */
class QueueWaitingRoomController extends AbstractController
{

    /**
     * Index
     *
     * @return mixed
     */
    public function index()
    {
        return view('queue::waitingroom.index');
    }
}