<?php

namespace KekecMed\Core\Exceptions;

use KekecMed\Core\Abstracts\Exceptions\AbstractGenericModelException;
use KekecMed\Core\Abstracts\Exceptions\FixCoded;
use KekecMed\Core\Abstracts\Exceptions\FixMessaged;
use KekecMed\Core\Abstracts\Models\ValidatableModel;

/**
 * Class ModelValidationException
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Exceptions
 */
class ModelValidationException extends AbstractGenericModelException implements FixCoded, FixMessaged
{

    /**
     * Get Error Code
     *
     * @return int
     */
    public function getFixCode()
    {
        return 200;
    }

    /**
     * Get Message
     *
     * @return string
     */
    public function getFixMessage()
    {
        /** @var ValidatableModel $model */
        $model = $this->getModel();

        return 'Validation for Model ' . get_class($this->getModel()) . ' failed on : ' . $model->getValidator()
                                                                                                ->errors()->toJson();
    }
}