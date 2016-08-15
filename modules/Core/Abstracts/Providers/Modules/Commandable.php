<?php namespace KekecMed\Core\Abstracts\Providers\Modules;

/**
 * Interface Commandable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Modules
 */
interface Commandable
{
    /**
     * Get commands as array
     * 
     * @return array
     */
    public function getCommands();
}