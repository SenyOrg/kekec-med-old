<?php namespace KekecMed\Core\Abstracts\Models;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;

/**
 * Trait PresentableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
trait PresentableModel
{
    /**
     * Presenter
     *
     * @var Presentable
     */
    protected $presenterInstance = null;

    /**
     * Get Presenter for Model
     *
     * @return AbstractPresenter
     * @throws \Exception
     */
    public function getPresenter()
    {
        if ($this->presenterInstance) {
            return $this->presenterInstance;
        }

        if ($this instanceof Presentable) {
            $class = $this->getPresenterClass();

            $this->presenterInstance = new $class($this);

            return $this->presenterInstance;
        }

        throw new \Exception('Model does not implement Presentable Interface.');
    }
}