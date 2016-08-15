<?php namespace KekecMed\Core\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ICDMeta
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 */
class ICDMeta extends Model
{

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = 'icd_metas';
    
    /**
     * Fillable Attributes
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'meta',
        'value',
        'icd_id'
    ];

}