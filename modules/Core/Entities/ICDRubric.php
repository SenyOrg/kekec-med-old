<?php namespace KekecMed\Core\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ICDRubric
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 */
class ICDRubric extends Model
{

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = 'icd_rubrics';

    /**
     * Fillable Attributes
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'content',
        'reference',
        'type_id',
        'icd_id'
    ];

    /**
     * Related ICD Chapter / Block / Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function icd()
    {
        return $this->belongsTo(ICD::class, 'icd_id');
    }

    /**
     * Related ICD Rubric Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ICDRubricType::class, 'type_id');
    }
}