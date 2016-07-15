<?php namespace KekecMed\Queue\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class QueueController extends Controller
{

    public function index()
    {
        return view('queue::index');
    }

}