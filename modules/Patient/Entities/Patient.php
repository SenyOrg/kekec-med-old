<?php namespace KekecMed\Patient\Entities;

use KekecMed\Consultation\Entities\Consultation;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\Fileable\Fileable;
use KekecMed\Core\Abstracts\Models\Fileable\FileableModel;
use KekecMed\Core\Abstracts\Models\Mediable\Mediable;
use KekecMed\Core\Abstracts\Models\Mediable\MediableModel;
use KekecMed\Core\Abstracts\Models\Noticeable\Noticeable;
use KekecMed\Core\Abstracts\Models\Noticeable\NoticeableModel;
use KekecMed\Core\Abstracts\Models\Presentable\Presentable;
use KekecMed\Core\Abstracts\Models\Presentable\PresentableModel;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Abstracts\Models\Taskable\Taskable;
use KekecMed\Core\Abstracts\Models\Taskable\TaskableModel;
use KekecMed\Core\Abstracts\Models\Validatable\Validatable;
use KekecMed\Core\Abstracts\Models\Validatable\ValidatableModel;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Insurance\Entities\Insurance;
use KekecMed\Patient\Presenters\PatientPresenter;

/**
 * Class Patient
 *
 * @property string $firstname
 * @property string $lastname
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Patient\Entities
 */
class Patient extends AbstractModel implements Dialogable, Validatable, Presentable, Fileable, Taskable, Mediable, Noticeable
{
    use ValidatableModel, PresentableModel, FileableModel, TaskableModel, MediableModel, NoticeableModel;

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
     * Get insurance of patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        $arr = [];

        self::select(['firstname', 'lastname', 'id'])->orderBy('firstname')->each(function (Patient $u) use (&$arr) {
            $arr[$u->id] = $u->getFullName();
        });

        return $arr;
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

    /**
     * Get path to upload directory
     *
     * @return string
     */
    public function getMediaFileUploadPath()
    {
        return 'patient/' . $this->id . '/';
    }

    /**
     * Get attribute to watch in request
     *
     * @return string
     */
    public function getMediaAttributes()
    {
        return [
            'media'            => 'mediaFile',
            'mediaDescription' => 'mediaDescription',
        ];
    }

    /**
     * Get related consultations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
