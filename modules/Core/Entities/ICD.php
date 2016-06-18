<?php namespace KekecMed\Core\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ICD
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 */
class ICD extends Model
{

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = 'icd';

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'title',
        'code',
        'path',
        'chapter_id',
        'block_id',
        'firstlevel_id',
        'secondlevel_id'
    ];

    /**
     * Related ICD Rubrics
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rubrics()
    {
        return $this->hasMany(ICDRubric::class, 'icd_id');
    }

    /**
     * Related ICD Metas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metas()
    {
        return $this->hasMany(ICDMeta::class, 'icd_id');
    }

}