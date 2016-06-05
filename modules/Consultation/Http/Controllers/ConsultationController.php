<?php namespace KekecMed\Consultation\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ConsultationController extends Controller {
	
	public function index()
	{
		return view('consultation::index');
	}
	
}