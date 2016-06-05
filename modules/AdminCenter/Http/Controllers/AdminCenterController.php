<?php namespace KekecMed\Admincenter\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class AdminCenterController extends Controller {
	
	public function index()
	{
		return view('admincenter::index');
	}
	
}