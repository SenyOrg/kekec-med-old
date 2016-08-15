<?php

namespace KekecMed\Core\Abstracts\Views\Elements;

/**
 * Class AbstractGenericInput
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Views\Elements
 */
abstract class AbstractGenericInput extends AbstractInput
{
    /**
     * Base path
     *
     * @var string
     */
    protected $lookupPath = 'core::elements.inputs';

    /**
     * Get path to EditView
     *
     * @return String
     */
    protected function getEditViewPath()
    {
        return $this->getViewPath(self::EDIT);
    }

    /**
     * Get ViewPath for given ViewMode
     *
     * @param string $mode
     *
     * @return string
     * @throws \Exception
     */
    private function getViewPath($mode = self::VIEW)
    {
        /**
         * Make sure that view for mode is present
         */
        if (!view()->exists($this->getFullPath($mode))) {
            throw new \Exception('GenericInputError: Blade template for class ' . __CLASS__ . ' with ' . $this->getIdentifier() .
                ' does not exist in ' . $this->getFullPath($mode) . '.');
        }

        return $this->getFullPath($mode);
    }

    /**
     * Get Full path to View
     *
     * @param string $mode
     *
     * @return string
     */
    protected function getFullPath($mode = self::VIEW)
    {
        return $this->lookupPath . '.' . $mode . '.' . $this->getIdentifier();
    }

    /**
     * Get Input Element Identifier
     * to resolve dependent Views automatically
     *
     * @return string
     */
    protected abstract function getIdentifier();

    /**
     * Get path to ViewView
     *
     * @return string
     */
    protected function getViewViewPath()
    {
        return $this->getViewPath(self::VIEW);
    }

    /**
     * Handle some default properties
     */
    protected function defaultHandler()
    {
        /**
         * Value Handling
         */
        if (!isset($this->parameters['value']) || is_null($this->parameters['value'])) {
            /**
             * Get Model if present
             */
            $model = static::model();

            if ($model !== null) {
                /**
                 * Get Models value for given propertyIndex
                 */
                $value = $model->{$this->parameters['name']};

                /**
                 * Set it if present
                 */
                if ($value != null) {
                    $this->parameters['value'] = $value;
                }
            }
        }

        if (!isset($this->parameters['id'])) {
            $this->parameters['id'] = $this->parameters['name'] . '_id';
        }
    }
}