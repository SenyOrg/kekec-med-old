<?php namespace KekecMed\Core\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ICDRubricType
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 */
class ICDRubricType extends Model
{

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = 'icd_rubric_types';

    /**
     * Fillable Attributes
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title'
    ];
}