<?php namespace KekecMed\Dashboard\Http\Controllers;

use KekecMed\Core\Http\Controllers\Core\AbstractController;

class DashboardController extends AbstractController
{

    public function index()
    {
        $this->getViewComponent()->modifyBreadcrumb(function ($menu) {
            $menu->route(
                'dashboard.index',
                'Dashboard',
                [],
                0,
                [
                    //'icon' => 'fa fa-dashboard'
                ]
            );
        });
        return view('dashboard::index');
    }

}