<?php namespace KekecMed\Task\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class TaskController extends Controller {
	
	public function index()
	{
		return view('task::index');
	}
	
}