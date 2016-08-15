<?php namespace KekecMed\Core\Abstracts\Providers;

use KekecMed\Core\Abstracts\Providers\Modules\Commandable;
use KekecMed\Core\Abstracts\Providers\Modules\Configable;
use KekecMed\Core\Abstracts\Providers\Modules\Eventable;
use KekecMed\Core\Abstracts\Providers\Modules\Translateable;
use KekecMed\Core\Abstracts\Providers\Modules\Viewable;

/**
 * Class AbstractModuleProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Providers
 */
abstract class AbstractModuleProvider extends AbstractProvider
{
    /**
     * Get module identifier
     *
     * @return string
     */
    protected abstract function getModuleIdentifier();

    /**
     * Get path to service provider
     * 
     * @return string
     */
    protected abstract function getServiceProviderPath();

    /**
     * Boot module specific resources
     */
    protected function bootModule()
    {
        if ($this instanceof Translateable) {
            $this->registerTranslations();
        }

        if ($this instanceof Configable) {
            $this->registerConfig();
        }

        if ($this instanceof Viewable) {
            $this->registerViews();
        }

        if ($this instanceof Commandable) {
            $this->registerCommands();
        }

        if ($this instanceof Eventable) {
            $this->registerEventListeners();
        }
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/' . $this->getModuleIdentifier());

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->getModuleIdentifier());
        } else {
            $this->loadTranslationsFrom($this->getServiceProviderPath() . '/../Resources/lang', $this->getModuleIdentifier());
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            $this->getServiceProviderPath() . '/../Config/' . $this->getModuleIdentifier() . '.config.php' => config_path($this->getModuleIdentifier() . '.php'),
        ]);
        $this->mergeConfigFrom(
            $this->getServiceProviderPath() . '/../Config/' . $this->getModuleIdentifier() . '.config.php', 'core'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/' . $this->getModuleIdentifier());

        $sourcePath = $this->getServiceProviderPath() . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/' . $this->getModuleIdentifier();
        }, \Config::get('view.paths')), [$sourcePath]), $this->getModuleIdentifier());
    }

    /**
     * Register commands
     */
    public function registerCommands()
    {
        /** @var  $this Commandable */
        $commandsArray = $this->getCommands();

        foreach ($commandsArray as $command) {
            $this->commands($command);
        }
    }

    /**
     * Register event listeners
     */
    public function registerEventListeners()
    {
        /** @var Eventable|self $this */
        $eventsArray = $this->getEvents();

        foreach ($eventsArray as $eventClass => $closure) {
            if (!($closure instanceof  \Closure)) {
                $this->getEventService()->subscribe($closure);
            } else {
                $this->getEventService()->listen($eventClass, $closure);
            }
        }
    }
    
    
}