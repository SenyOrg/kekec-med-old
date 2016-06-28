<?php

namespace KekecMed\Core\Views\Elements;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use KekecMed\Core\Abstracts\Models\Presentable;
use KekecMed\Core\Abstracts\Views\Elements\AbstractGenericInputParameters;
use KekecMed\Core\Entities\Dialogable;

/**
 * Class Select
 *
 * General select element
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class Select extends AbstractGenericInputParameters
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [
        'trackChanges' => true,
        'emptyOption'  => true,
    ];

    /**
     * Attribute
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Handle inputs
     *
     * @param null $viewMode
     */
    protected function handle($viewMode = null)
    {
        $this->defaultHandler();
        $this->optionsHandler();
    }

    /**
     * OptionsHandler
     */
    protected function optionsHandler()
    {
        if (!isset($this->parameters['options'])) {
            if (isset($this->parameters['model'])) {
                /**
                 * Resolve Relations first
                 */
                if ($this->parameters['model'] instanceof HasMany ||
                    $this->parameters['model'] instanceof BelongsTo ||
                    $this->parameters['model'] instanceof BelongsToMany
                ) {
                    $this->parameters['model'] = $this->parameters['model']->getRelated();
                }

                $instance = new $this->parameters['model']();

                if ($instance instanceof Dialogable) {
                    $this->parameters['options'] = $instance->getDialogData();
                } else {
                    $this->parameters['options'] = $instance::lists('title', 'id')->toArray();
                }

                $this->parameters['presentable'] = $this->parameters['value'];
                if ($this->getViewMode() == 'view') {
                    if (isset($this->parameters['value'])) {
                        $modelInstance = $this->parameters['model']::find($this->parameters['value']);

                        if ($modelInstance instanceof Presentable) {
                            $this->parameters['presentable'] = $modelInstance->getPresenter()->getRepresentable();
                        }
                    }
                }
            }
        }
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'select';
    }
}