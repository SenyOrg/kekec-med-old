<?php namespace KekecMed\Core\Abstracts\Models;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Abstracts\Models\Mediable\Mediable;
use KekecMed\Core\Abstracts\Models\Mediable\MediableModel;
use KekecMed\Core\Abstracts\Models\Noticeable\Noticeable;
use KekecMed\Core\Abstracts\Models\Noticeable\NoticeableModel;
use KekecMed\Core\Abstracts\Models\Taskable\Taskable;
use KekecMed\Core\Abstracts\Models\Taskable\TaskableModel;

/**
 * Class AbstractModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
abstract class AbstractModel extends Model
{
    /**
     * Create a new Eloquent model instance.
     *
     * @param  array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        /**
         * Creating Callback
         */
        $this->creating(function (AbstractModel $model) {
            if ($model instanceof Validatable) {
                /** @var ValidatableModel|Validatable $model */
                $model->callValidatable($model);
            }

            if ($model instanceof Fileable) {
                /** @var FileableModel|Fileable $model */
                $model->callFileableUpdate($model);
            }

            return $model;
        });

        /**
         * Updating Callback
         */
        $this->updating(function (AbstractModel $model) {
            if ($model instanceof Validatable) {
                /** @var ValidatableModel|Validatable $model */
                $model->callValidatable($model);
            }

            if ($model instanceof Fileable) {
                /** @var FileableModel|Fileable $model */
                $model->callFileableUpdate($model);
            }

            return $model;
        });

        /**
         * Deleted Callback
         */
        $this->deleted(function (AbstractModel $model) {
            if ($model instanceof Fileable) {
                /** @var FileableModel|Fileable $model */
                $model->callFileableDelete($model);
            }

            if ($model instanceof Taskable) {
                /** @var TaskableModel|Taskable $model */
                $model->callTaskableDelete($model);
            }

            if ($model instanceof Noticeable) {
                /** @var NoticeableModel|Noticeable $model */
                $model->callNoticeableDelete($model);
            }

            if ($model instanceof Mediable) {
                /** @var MediableModel|Mediable $model */
                $model->callMediableDelete($model);
            }

            return $model;
        });
    }

}