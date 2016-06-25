<?php

namespace KekecMed\Core\Abstracts\Models\Presenter;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractPresenter
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models\Presenter
 */
abstract class AbstractPresenter
{
    /**
     * Model
     *
     * @var Model
     */
    protected $model = null;

    /**
     * AbstractPresenter constructor.
     *
     * @param AbstractModel $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get Model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }
}