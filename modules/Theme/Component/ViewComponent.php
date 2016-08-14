<?php namespace KekecMed\Theme\Component;

use Illuminate\Support\Facades\Auth;
use KekecMed\Core\Abstracts\Controllers\AbstractController;
use KekecMed\Core\Abstracts\Controllers\AbstractCoreController;
use KekecMed\Core\Abstracts\Views\Elements\AbstractElement;
use Yajra\Datatables\Services\DataTable;

class ViewComponent
{

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
     * Page Header
     *
     * @var null
     */
    private $pageHeader = 'KekecMed';

    /**
     * Page Sub Header
     *
     * @var null
     */
    private $pageSubHeader = null;

    /**
     * @var string
     */
    private $sidebarInstanceIdentifier = 'sidebarMenu';
    private $breadcrumbInstanceIdentifier = 'breadcrumbNavigation';

    /**
     * ViewComponent constructor.
     */
    private function __construct()
    {
        /**
         * Create Sidebar
         */
        \Menu::create($this->sidebarInstanceIdentifier, function ($menu) {
        });

        /**
         * Create Breadcrumb
         */
        \Menu::create($this->breadcrumbInstanceIdentifier, function ($menu) {
        });
        $this->modifyBreadcrumb(function ($menu) {
            $menu->route(
                'homeroute',
                ViewComponent::getTitle(),
                [],
                0,
                [
                    'icon' => 'fa fa-heartbeat'
                ]
            );
        });
    }

    /**
     * Modify SideMenu
     *
     * @param $closure
     */
    public function modifyBreadcrumb($closure)
    {
        \Menu::modify($this->breadcrumbInstanceIdentifier, $closure);
    }

    /**
     * Get title for page
     *
     * @return string
     */
    public function getTitle()
    {
        return "KekecMED";
    }

    /**
     * Get instance
     *
     * @return ViewComponent|null
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get currently logged in user
     *
     * @return Model
     */
    public function getUser()
    {
        return Auth::user();
    }

    /**
     * Get theme base layout view path
     *
     * @return string
     */
    public function getTheme()
    {
        return 'theme::admin-lte.app.main';
    }

    /**
     * Get them auth layout view path
     *
     * @return string
     */
    public function getAuthTheme()
    {
        return 'theme::admin-lte.auth.main';
    }

    /**
     * Get theme hero layout view path
     *
     * @return string
     */
    public function getHeroTheme()
    {
        return 'theme::admin-lte.hero.main';
    }

    /**
     * Get / Set DataTable
     *
     * @param DataTable $dataTable
     */
    public function dataTable(DataTable $dataTable = null)
    {
        if ($dataTable) {
            $this->dataTable = $dataTable;
        }

        return $this->dataTable;
    }

    /**
     * Get / Set controller
     *
     * @param AbstractCoreController|null $controller
     *
     * @return AbstractCoreController|null
     */
    public function controller(AbstractController $controller = null)
    {
        if ($controller) {
            $this->controller = $controller;
        }

        return $this->controller;
    }

    public function getDateFormat()
    {
        return 'yyyy-mm-dd';
    }

    /**
     * Get DateTimeFormat
     *
     * @return string
     */
    public function getDateTimeFormat($placeholder = false)
    {
        if (!$placeholder) {
            return 'y-m-d h:s';
        }

        return 'yyyy-mm-dd hh:mm';
    }

    public function getDataTimeFormatAsMomentJS()
    {
        return 'YYYY-MM-DD HH:mm';
    }

    /**
     * Modify SideMenu
     *
     * @param $closure
     */
    public function modifySidebar($closure)
    {
        \Menu::modify($this->sidebarInstanceIdentifier, $closure);
    }

    /**
     * Render Sidebar
     *
     * @return string
     */
    public function renderSidebar()
    {
        return \Menu::render($this->sidebarInstanceIdentifier, AdminLTEMenuPresenter::class);
    }

    /**
     * Render Sidebar
     *
     * @return string
     */
    public function renderBreadcrumb()
    {
        return \Menu::render($this->breadcrumbInstanceIdentifier, BreadcrumbMenuPresenter::class);
    }

    /**
     * @return null
     */
    public function getPageHeader()
    {
        return $this->pageHeader;
    }

    /**
     * @param null $pageHeader
     */
    public function setPageHeader($pageHeader)
    {
        $this->pageHeader = $pageHeader;
    }

    /**
     * @return null
     */
    public function getPageSubHeader()
    {
        return $this->pageSubHeader;
    }

    /**
     * @param null $pageSubHeader
     */
    public function setPageSubHeader($pageSubHeader)
    {
        $this->pageSubHeader = $pageSubHeader;
    }

    /**
     * Set global viewMode
     *
     * @param $viewMode
     */
    public function setViewMode($viewMode)
    {
        AbstractElement::setGlobalViewMode($viewMode);
    }

    /**
     * Get Theme asset
     *
     * @param $file
     *
     * @return mixed
     */
    public function getThemeAsset($file)
    {
        return asset('vendor/' . $this->getThemeIdentifier() . '/' . $file);
    }

    /**
     * Get ThemeIdentifier
     *
     * @return string
     */
    public function getThemeIdentifier()
    {
        return 'admin-lte';
    }
}
