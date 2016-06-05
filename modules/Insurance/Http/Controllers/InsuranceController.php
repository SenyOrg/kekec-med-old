<?php namespace KekecMed\Insurance\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class InsuranceController extends Controller {
	
	public function index()
	{
		return view('insurance::index');
	}
	
}