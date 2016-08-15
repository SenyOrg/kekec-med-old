<?php

namespace KekecMed\Core\Abstracts\Exceptions;

/**
 * Interface FixCoded
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Exceptions
 */
interface FixCoded
{
    /**
     * Get Error Code
     *
     * @return int
     */
    public function getFixCode();
}