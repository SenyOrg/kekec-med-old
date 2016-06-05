<?php namespace KekecMed\Patient\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class PatientController extends Controller {
	
	public function index()
	{
		return view('patient::index');
	}
	
}