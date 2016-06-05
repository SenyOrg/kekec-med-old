<?php namespace KekecMed\Calendar\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class CalendarController extends Controller {
	
	public function index()
	{
		return view('calendar::index');
	}
	
}