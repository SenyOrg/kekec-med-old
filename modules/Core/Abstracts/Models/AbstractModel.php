<?php namespace KekecMed\Core\Abstracts\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\ore\Abstracts\Models
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

            return $model;
        });
    }

}