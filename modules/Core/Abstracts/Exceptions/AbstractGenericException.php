<?php

namespace KekecMed\Core\Abstracts\Exceptions;

use Exception;

/**
 * Class AbstractGenericException
 *
 * @author  Selcuk Kekc <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Exceptions
 */
abstract class AbstractGenericException extends AbstractException
{
    /**
     * Construct the exception. Note: The message is NOT binary safe.
     *
     * @link  http://php.net/manual/en/exception.construct.php
     *
     * @param string    $message  [optional] The Exception message to throw.
     * @param int       $code     [optional] The Exception code.
     * @param Exception $previous [optional] The previous exception used for the exception chaining. Since 5.3.0
     *
     * @since 5.1.0
     */
    public function __construct($message, $code, Exception $previous = null)
    {
        if ($this instanceof FixCoded) {
            $code = defNull($code, $this->getFixCode());
        }

        if ($this instanceof FixMessaged) {
            $message = defNull($message, $this->getFixMessage());
        }

        parent::__construct($message, $code, $previous);
    }
}