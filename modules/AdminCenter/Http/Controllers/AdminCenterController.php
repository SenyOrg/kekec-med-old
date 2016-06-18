<?php namespace KekecMed\Admincenter\Http\Controllers;

use KekecMed\Core\Http\Controllers\Core\AbstractController;

class AdminCenterController extends AbstractController
{

    public function index()
    {
        return view('admincenter::index');
    }

}