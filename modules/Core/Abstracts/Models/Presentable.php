<?php namespace KekecMed\Core\Abstracts\Models;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;

/**
 * Class Presentable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\ore\Abstracts\Models
 */
interface Presentable
{
    /**
     * Get Presenter Class
     *
     * @return AbstractPresenter
     */
    public function getPresenterClass();
}