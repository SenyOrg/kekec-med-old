<?php

namespace KekecMed\Core\Abstracts\Exceptions;

/**
 * Interface FixMessaged
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Exceptions
 */
interface FixMessaged
{
    /**
     * Get Message
     *
     * @return string
     */
    public function getFixMessage();
}