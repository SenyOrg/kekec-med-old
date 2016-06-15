<?php namespace KekecMed\Theme\Component;

use Illuminate\Support\Facades\Auth;
use KekecMed\Core\Http\Controllers\AbstractCoreController;
use Yajra\Datatables\Services\DataTable;

class ViewComponent {

    private static $instance = null;

    /**
     * Controller instance
     *
     * @var
     */
    private $controller = null;

    /**
     * DataTable instance
     * 
     * @var null
     */
    private $dataTable = null;


    /**
     * ViewComponent constructor.
     */
    private function __construct() {}

    /**
     * Get currently logged in user
     *
     * @return Model
     */
    public function getUser() {
        return Auth::user();
    }

    /**
     * Get title for page
     *
     * @return string
     */
    public function getTitle() {
        return "KekecMED";
    }

    /**
     * Get instance
     *
     * @return ViewComponent|null
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get theme base layout view path
     *
     * @return string
     */
    public function getTheme(){
        return 'theme::admin-lte.app.main';
    }

    /**
     * Get them auth layout view path
     *
     * @return string
     */
    public function getAuthTheme(){
        return 'theme::admin-lte.auth.main';
    }

    /**
     * Get / Set DataTable
     *
     * @param DataTable $dataTable
     */
    public function dataTable(DataTable $dataTable = null) {
        if ($dataTable)
            $this->dataTable = $dataTable;

        return $this->dataTable;
    }

    /**
     * Get / Set controller
     *
     * @param AbstractCoreController|null $controller
     * @return AbstractCoreController|null
     */
    public function controller(AbstractCoreController $controller = null) {
        if ($controller)
            $this->controller = $controller;

        return $this->controller;
    }

    public function getDateFormat() {
        return 'yyyy-mm-dd';
    }

    /**
     * Get DateTimeFormat
     * 
     * @return string
     */
    public function getDateTimeFormat($placeholder = false) {
        if (!$placeholder)
            return 'y-m-d h:s';
        
        return 'yyyy-mm-dd hh:mm';
    }

    public function getDataTimeFormatAsMomentJS() {
        return 'YYYY-MM-DD HH:mm';
    }
}
