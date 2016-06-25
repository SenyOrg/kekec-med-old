<?php namespace KekecMed\Patient\Entities;

use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\Validatable;
use KekecMed\Core\Abstracts\Models\ValidatableModel;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Core\Entities\ImageableModel;
use KekecMed\Insurance\Entities\Insurance;
use KekecMed\Task\Entities\Task;

/**
 * Class Patient
 *
 * @property Insurance insurance
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Patient\Entities
 */
class Patient extends AbstractModel implements Dialogable, Validatable
{
    use ImageableModel, ValidatableModel;

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

    /**
     * Get Validation Rules
     *
     * @return array
     */
    public function getValidationRules()
    {
        return [
            'rules'    => [
                'firstname'      => 'required|alpha',
                'lastname'       => 'required|alpha',
                'gender'         => 'in:m,w',
                'image',
                'birthdate'      => 'required|date',
                'insurance_type' => 'required',
                'insurance_id'   => 'required|exists:insurances,id',
                'insurance_no'   => 'required',
                'phone'          => 'numeric',
                'mobile'         => 'numeric',
                'email'          => 'email',
                'street'         => 'alpha_num',
                'no'             => 'alpha_num',
                'zipcode'        => 'numeric'
            ],
            'messages' => []
        ];
    }
}
