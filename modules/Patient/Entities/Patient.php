<?php namespace KekecMed\Patient\Entities;

use Illuminate\Database\Eloquent\Model;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Core\Entities\ImageableModel;
use KekecMed\Insurance\Entities\Insurance;
use KekecMed\Task\Entities\Task;

/**
 * Class Patient
 * -----------------------------
 *
 * -----------------------------
 * @package App
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class Patient extends Model implements Dialogable
{
    use ImageableModel;

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
        return $this->belongsTo(Insurance::class);
    }

    /**
     * Get Insurance object.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'object_id');
    }

    /**
     * Get Image Url
     *
     * @return mixed
     */
    public function getImageUrl()
    {
        return \Storage::url($this->image);
    }

    /**
     * Get Fullname
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        $arr = [];

        self::select(['firstname', 'lastname', 'id'])->orderBy('firstname')->each(function ($u) use (&$arr) {
            $arr[$u->id] = $u->getFullName();
        });

        return $arr;
    }
}
