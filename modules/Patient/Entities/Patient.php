<?php namespace KekecMed\Patient\Entities;

use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\Fileable;
use KekecMed\Core\Abstracts\Models\FileableModel;
use KekecMed\Core\Abstracts\Models\Presentable;
use KekecMed\Core\Abstracts\Models\PresentableModel;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Abstracts\Models\Validatable;
use KekecMed\Core\Abstracts\Models\ValidatableModel;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Insurance\Entities\Insurance;
use KekecMed\Patient\Presenters\PatientPresenter;
use KekecMed\Task\Entities\Task;

/**
 * Class Patient
 *
 * @property Insurance insurance
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Patient\Entities
 */
class Patient extends AbstractModel implements Dialogable, Validatable, Presentable, Fileable
{
    use ValidatableModel, PresentableModel, FileableModel;

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
                'birthdate'      => 'date',
                'insurance_type' => 'required',
                'insurance_id'   => 'required|exists:insurances,id',
                'insurance_no'   => 'required',
                'phone'          => '',
                'mobile'         => '',
                'email'          => 'email',
                'street'         => '',
                'no'             => 'alpha_num',
                'zipcode'        => 'numeric'
            ],
            'messages' => []
        ];
    }

    /**
     * Get Presenter Class
     *
     * @return AbstractPresenter
     */
    public function getPresenterClass()
    {
        return PatientPresenter::class;
    }

    /**
     * Get array of file attributes
     *
     * @return array
     */
    public function getFileAttributes()
    {
        return ['image'];
    }
}
