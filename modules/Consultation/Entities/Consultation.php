<?php namespace KekecMed\Consultation\Entities;

use KekecMed\Consultation\Entities\Presenters\ConsultationPresenter;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\Mediable\Mediable;
use KekecMed\Core\Abstracts\Models\Mediable\MediableModel;
use KekecMed\Core\Abstracts\Models\Noticeable\Noticeable;
use KekecMed\Core\Abstracts\Models\Noticeable\NoticeableModel;
use KekecMed\Core\Abstracts\Models\Presentable;
use KekecMed\Core\Abstracts\Models\PresentableModel;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Abstracts\Models\Taskable\Taskable;
use KekecMed\Core\Abstracts\Models\Taskable\TaskableModel;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Event\Entities\Event;
use KekecMed\Patient\Entities\Patient;

/**
 * Class Consultation
 *
 * @author  Selcuk Kekc <senycorp@googlemail.com>
 * @package KekecMed\Consultation\Entities
 */
class Consultation extends AbstractModel implements Taskable, Noticeable, Mediable, Presentable, Dialogable
{
    use TaskableModel, NoticeableModel, MediableModel, PresentableModel;

    protected $fillable = [
        'event_id',
        'patient_id',
        'start',
        'end',
        'description'
    ];

    /**
     * Get related patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get related event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get path to upload directory
     *
     * @return string
     */
    public function getMediaFileUploadPath()
    {
        return 'consultation/' . $this->id . '/';
    }

    /**
     * Get attribute to watch in request
     *
     * @return array
     */
    public function getMediaAttributes()
    {
        return [
            'media'            => 'mediaFile',
            'mediaDescription' => 'mediaDescription',
        ];
    }

    /**
     * Get Presenter Class
     *
     * @return AbstractPresenter
     */
    public function getPresenterClass()
    {
        return ConsultationPresenter::class;
    }

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        $arr = [];

        self::select(['id'])->orderBy('id')->each(function (Consultation $u) use (&$arr) {
            $arr[$u->id] = $u->getPresenter()->getRepresentable();
        });

        return $arr;
    }
}