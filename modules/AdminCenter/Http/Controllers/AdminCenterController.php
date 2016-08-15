<?php namespace KekecMed\Admincenter\Http\Controllers;

use KekecMed\Core\Abstracts\Controllers\AbstractController;

class AdminCenterController extends AbstractController
{

    public function index()
    {
        return view('admincenter::index');
    }

}