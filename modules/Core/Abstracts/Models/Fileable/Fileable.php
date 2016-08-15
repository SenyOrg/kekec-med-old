<?php namespace KekecMed\Core\Abstracts\Models\Fileable;


/**
 * Interface Fileable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
interface Fileable
{
    /**
     * Get array of file attributes
     *
     * @return array
     */
    public function getFileAttributes();
}