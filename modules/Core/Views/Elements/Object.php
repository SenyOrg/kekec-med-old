<?php

namespace KekecMed\Core\Views\Elements;

use KekecMed\Consultation\Entities\Consultation;
use KekecMed\Core\Abstracts\Models\Presentable;
use KekecMed\Core\Abstracts\Views\Elements\AbstractGenericInputParameters;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Event\Entities\Event;
use KekecMed\Patient\Entities\Patient;

/**
 * Class Object
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Views\Elements
 */
class Object extends AbstractGenericInputParameters
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration = [
        'icon'         => 'fa fa-object',
        'labelClass'   => 'primary',
        'trackChanges' => true,
        'maxChars'     => 100,
        'multiple'     => false,
        'values'       => [],
        'value'        => null,
        'emptyOption'  => true,
    ];

    /**
     * Attribute
     *
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Handle inputs make some
     *
     * @param null $viewMode
     *
     * @throws \Exception
     */
    protected function handle($viewMode = null)
    {
        $this->defaultHandler();

        if (!isset($this->parameters['interface'])) {
            throw new \Exception('Element \'object\' needs parameter \'interface\' to be set.');
        }


        /**
         * @todo: We have to update this array with available models each time :(
         */
        // Retrieve classes that implements a given interface
        $models = getImplementingClasses($this->parameters['interface'], [
            Patient::class,
            Event::class,
            Consultation::class,
        ]);

        // Transform single selection into multiple
        if (isset($this->parameters['value'])) {
            $this->parameters['values'] = [$this->parameters['value']];
        }

        $results = [];
        $options = [];
        if (is_array($models) && count($models)) {

            // Traverse models
            foreach ($models as $modelClass) {
                $modelInstance = new $modelClass;

                // Extract type - actually the class name without namespace
                $type = last(explode('\\', $modelClass));

                // Check for dialogable interface
                if ($modelInstance instanceof Dialogable) {
                    $result = $modelInstance->getDialogData();

                    foreach ($result as $key => $value) {
                        // Modify id and title - prepend model class to id and type to title
                        $result[$modelClass . '-' . $key] = $type . ' > ' . $value;

                        // Unset original index
                        unset($result[$key]);
                    }

                    // Save modified resultset
                    $options[$type] = $result;
                    $results += $result;
                } else {
                    // Get all records
                    $result = $modelClass::all();

                    foreach ($result as $record) {
                        if ($record instanceof Presentable) {
                            // Make use of presentable
                            $options[$type][$modelClass . '-' . $record->id] = $record->getPresenter()
                                                                                      ->getRepresentable();
                        } else {
                            // Otherwise try to get title field - This is really risky!
                            $options[$type][$modelClass . '-' . $record->id] = $type . ' > ' . $record->title;
                        }
                    }

                    // Prepend result to resultset
                    $results += $options[$type];
                }
            }
        }

        // Set available options and replace default configuration
        $this->parameters['options'] = $options;
        $this->parameters = array_replace($this->configuration, $this->parameters);

        // Handle VIEW-Mode
        if ($this->getViewMode($viewMode) == self::VIEW) {
            // This foreach()-loop is for multiple selection mode
            foreach ($this->parameters['values'] as $key => $value) {
                if ($value != '-') {
                    if (isset($results[$value])) {
                        $this->parameters['viewValues'][] = $results[$value];
                    } else {
                        throw new \Exception('What does that mean???');
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
        return 'object';
    }
}