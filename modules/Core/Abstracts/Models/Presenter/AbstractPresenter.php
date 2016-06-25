<?php

namespace KekecMed\Core\Abstracts\Models\Presenter;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Abstracts\Models\Presentable;

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
     * @param Presentable $model
     */
    public function __construct(Presentable $model)
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