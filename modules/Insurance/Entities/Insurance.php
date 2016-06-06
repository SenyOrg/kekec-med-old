<?php namespace KekecMed\Insurance\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Insurance
 * -----------------------------
 *
 * -----------------------------
 * @package App
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class Insurance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'homepage', 'region', 'rate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get patients
     */
    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}