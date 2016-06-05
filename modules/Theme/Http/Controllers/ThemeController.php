<?php namespace KekecMed\Theme\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ThemeController extends Controller {
	
	public function index()
	{
		return view('theme::index');
	}
	
}