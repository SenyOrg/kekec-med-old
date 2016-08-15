<?php namespace KekecMed\Core\Abstracts\Models;

/**
 * Trait ObjectableModel
 *
 * This trait is for models including polymorphic relations
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
trait ObjectableModel
{
    /**
     * Get related object
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function object()
    {
        return $this->morphTo('object');
    }

    /**
     * Set objectId Mutator
     *
     * This closure is needed to transform the object_id which is an array
     * per default to an simple element.
     *
     * @param $value
     */
    public function setObjectIdAttribute($value)
    {
        // Check if given value is an array
        if (is_array($value)) {
            // Split object type and id by '-'
            list($this->attributes['object_type'], $this->attributes['object_id']) = explode('-', array_first($value));
        } else {
            // Otherwise set attribute and leave
            $this->attributes['object_id'] = $value;
        }
    }
}