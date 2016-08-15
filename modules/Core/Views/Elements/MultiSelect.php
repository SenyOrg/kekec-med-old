<?php

namespace KekecMed\Core\Views\Elements;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class MultiSelect
 *
 * General multi select element
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class MultiSelect extends Select
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [
        'trackChanges' => true,
        'emptyOption'  => true,
        'icon'         => null,
        'labelClass'   => 'primary',
        'maxChars'     => 50,
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
        parent::handle($viewMode);

        /**
         * Handling for values
         */
        if (isset($this->parameters['values']) && !is_array($this->parameters['values'])) {
            /**
             * Do we have a relation object
             */
            if ($this->parameters['values'] instanceof HasMany ||
                $this->parameters['values'] instanceof BelongsTo ||
                $this->parameters['values'] instanceof BelongsToMany
            ) {

                /**
                 * Resolve related data to a collection
                 */
                $this->parameters['values'] = $this->parameters['values']->get();
            }

            /**
             * Retrieve IDs from Collections
             */
            if ($this->parameters['values'] instanceof Collection) {
                /**
                 * Switch ViewMode
                 */
                if ($this->getViewMode($viewMode) == 'edit') {
                    /**
                     * Extract IDs from values
                     */
                    $this->parameters['values'] = $this->parameters['values']->pluck('id')->toArray();
                } else {
                    /**
                     * Extract Titles from values
                     */
                    $this->parameters['values'] = $this->parameters['values']->pluck('title')->toArray();
                }
            }
        }

        $this->parameters = array_replace($this->configuration, $this->parameters);
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'multiselect';
    }
}