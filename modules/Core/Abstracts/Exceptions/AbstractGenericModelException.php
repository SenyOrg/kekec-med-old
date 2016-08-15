<?php

namespace KekecMed\Core\Abstracts\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractGenericModelException
 *
 * @author  Selcuk Kekc <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Exceptions
 */
abstract class AbstractGenericModelException extends AbstractGenericException
{
    /**
     * Model instance
     *
     * @var Model
     */
    protected $model = null;

    /**
     * AbstractGenericModelException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Exception|null $previous
     * @param Model          $model
     */
    public function __construct($message, $code, Exception $previous = null, Model $model)
    {
        // Set Model
        $this->setModel($model);

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get Model
     *
     * @return Model
     */
    protected function getModel()
    {
        return $this->model;
    }

    /**
     * Set model
     *
     * @param Model $model
     */
    protected function setModel($model)
    {
        $this->model = $model;
    }

}