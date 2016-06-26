<?php

namespace KekecMed\Core\Abstracts\Views\Elements;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

/**
 * Class AbstractElement
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Views\Elements
 */
abstract class AbstractElement
{
    /**
     * ViewMode: View
     */
    const VIEW = 'view';

    /**
     * ViewMode: Edit
     */
    const EDIT = 'edit';

    /**
     * Global: ViewMode
     *
     * Default mode which is used
     * when ever no other instance mode is provided
     *
     * @var string
     */
    protected static $globalViewMode = self::VIEW;

    /**
     * Global Model
     *
     * @var Model
     */
    protected static $model;

    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [];

    /**
     * Parameters
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Attribute
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * ViewMode of instance
     *
     * @var null
     */
    protected $viewMode = null;

    /**
     * AbstractElement constructor.
     *
     * @param array $configuration
     * @param array $parameters
     * @param array $attributes
     */
    public function __construct(array $configuration = [], array $parameters = [], array $attributes = [])
    {
        /**
         * Merge provided parameter arrays with default ones
         */
        $this->configuration = array_replace_recursive($this->configuration, $configuration);
        $this->parameters = array_replace_recursive($this->parameters, $parameters);
        $this->attributes = array_replace_recursive($this->attributes, $attributes);

        /**
         * Handle everything first
         */
        $this->handle();
    }

    /**
     * Handle inputs make some
     *
     * @param null $viewMode
     */
    protected abstract function handle($viewMode = null);

    /**
     * Get global ViewMode
     *
     * !! This is used by all Elements by default !!
     *
     * @return string
     */
    public static function getGlobalViewMode()
    {
        return self::$globalViewMode;
    }

    /**
     * Set global ViewMode
     *
     * !! This is used by all Elements by default !!
     *
     * @param string $globalViewMode
     */
    public static function setGlobalViewMode($globalViewMode)
    {
        self::$globalViewMode = $globalViewMode;
    }

    /**
     * Create and render element immediatly
     *
     * @param $configuration
     * @param $parameter
     * @param $attributes
     *
     * @return string
     * @throws \Exception
     */
    public static function get($parameter = null, $configuration = null, $attributes = null)
    {
        return static::factory($configuration, $parameter, $attributes)->render();
    }

    /**
     * Render Element
     *
     * @param null $viewMode
     *
     * @return string
     * @throws \Exception
     */
    public function render($viewMode = null)
    {

        /**
         * Get calculated viewMode [LOCAL > INSTANCE > GLOBAL]
         */
        $viewMode = $this->getViewMode($viewMode);

        /**
         * Handle everything first
         */
        //$this->handle($viewMode);

        /**
         * Render Elemenet
         */
        if ($viewMode == self::VIEW) {
            /**
             * Render viewable element
             */
            return new HtmlString($this->renderView());
        } else {
            if ($viewMode == self::EDIT) {
                /**
                 * Render editable element
                 */
                return new HtmlString($this->renderEdit());
            }
        }

        throw new \Exception('Provided ViewMode is not supported.');
    }

    /**
     * Get ViewMode
     *
     * @param null $local Local ViewMode
     *
     * @return null
     */
    public function getViewMode($local = null)
    {
        return self::handleViewModes($local, $this->viewMode, static::$globalViewMode);
    }

    /**
     * Set ViewMode
     *
     * @param null $viewMode
     *
     * @return $this
     */
    public function setViewMode($viewMode)
    {
        $this->viewMode = $viewMode;

        return $this;
    }

    /**
     * Calculate ViewMode
     *
     * @param null $local
     * @param null $instance
     * @param null $global
     *
     * @return null
     */
    private static function handleViewModes($local = null, $instance = null, $global = null)
    {
        /**
         * Local?
         */
        if ($local !== null) {
            return $local;
        }

        /**
         * Instance?
         */
        if ($instance !== null) {
            return $instance;
        }

        /**
         * Local and Instance are null. Let us use the global one.
         */
        return $global;
    }

    /**
     * Renders ViewMode representation
     *
     * @return string
     */
    protected abstract function renderView();

    /**
     * Renders EditMode representation
     *
     * @return string
     */
    protected abstract function renderEdit();

    /**
     * Create a new Element instance
     *
     * @param array $configuration
     * @param array $parameter
     * @param array $attributes
     *
     * @return static
     */
    public static function factory($parameter = null, $configuration = null, $attributes = null)
    {
        $configuration = defNull($configuration, []);
        $parameter = defNull($parameter, []);
        $attributes = defNull($attributes, []);

        return new static($configuration, $parameter, $attributes);
    }

    /**
     * Get / Set model
     *
     * @param Model|null $model
     *
     * @return Model|null
     */
    public static function model(Model $model = null)
    {
        /**
         * Set model if provided
         */
        if ($model !== null) {
            self::$model = $model;
        } else {
            return self::$model;
        }

        return null;
    }

    /**
     * Set global ViewMode for all instances
     *
     * @param $viewMode
     */
    public static function viewMode($viewMode)
    {
        self::$globalViewMode = $viewMode;
    }

    /**
     * Render
     *
     * @return string
     * @throws \Exception
     */
    public function __toString()
    {
        return e($this->render());
    }

    /**
     * Get element parameters
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}