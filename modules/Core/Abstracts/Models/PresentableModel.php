<?php namespace KekecMed\Core\Abstracts\Models;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;

/**
 * Trait PresentableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\ore\Abstracts\Models
 */
trait PresentableModel
{
    /**
     * Get Presenter for Model
     *
     * @return AbstractPresenter
     * @throws \Exception
     */
    public function getPresenter()
    {
        if ($this instanceof Presentable) {
            $class = $this->getPresenterClass();

            return new $class($this);
        }

        throw new \Exception('Model does not implement Presentable Interface.');
    }
}