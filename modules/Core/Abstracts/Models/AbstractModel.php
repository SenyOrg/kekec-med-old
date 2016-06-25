<?php namespace KekecMed\Core\Abstracts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;
use KekecMed\Core\Exceptions\ModelValidationException;

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
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        parent::__construct($attributes);

        if ($this instanceof Validatable) {
            $this->creating(function (Validatable $model) {
                /** @var Validator $validator */
                $validator = $model->getValidator();

                if ($validator->fails()) {
                    return $validator;
                }

                return true;
            });

            $this->updating(function (Validatable $model) {
                /** @var Validator $validator */
                $validator = $model->getValidator();

                if ($validator->fails()) {
                    throw new ModelValidationException(null, 200, null, $model);
                }

                return true;
            });
        }
    }

}