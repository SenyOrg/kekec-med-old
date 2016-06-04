<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 * -----------------------------
 * 
 * -----------------------------
 * @package App
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class Patient extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'image',
        'birthdate',
        'insurance_type',
        'insurance_id',
        'insurance_no',
        'phone',
        'mobile',
        'email',
        'street',
        'no',
        'zipcode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get Insurance object.
     */
    public function insurance()
    {
        return $this->belongsTo('App\Insurance');
    }

    /**
     * Get Insurance object.
     */
    public function tasks()
    {
        return $this->hasMany('App\Task', 'object_id');
    }

    /**
     * Get Image Url
     * 
     * @return mixed
     */
    public function getImageUrl() {
        return \Storage::url($this->image);
    }

    /**
     * Get Fullname
     * 
     * @return string
     */
    public function getFullName() {
        return $this->firstname . ' ' . $this->lastname;
    }
}
