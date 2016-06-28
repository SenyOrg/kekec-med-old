<?php namespace KekecMed\Core\Abstracts\Models;

/**
 * Class Relational
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
interface Relational
{
    /**
     * Get relational Meta
     *
     * @return array[RelationalMeta]
     */
    public function getRelationalMeta();
}