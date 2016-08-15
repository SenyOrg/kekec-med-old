<?php namespace KekecMed\Dashboard\Http\Controllers;

use KekecMed\Core\Abstracts\Controllers\AbstractController;
use KekecMed\Core\Abstracts\Controllers\Traits\Headful;

class DashboardController extends AbstractController
    implements Headful
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

    /**
     * Get PageHeader
     *
     * @return string
     */
    public function getPageHeader()
    {
        return 'Dashboard';
    }

    /**
     * Get SubPageHeader
     *
     * @return string
     */
    public function getPageSubHeader()
    {
        return 'Overview and Statistics';
    }

}