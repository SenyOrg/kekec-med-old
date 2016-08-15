<?php namespace KekecMed\Notice\Entities;

use App\User;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\ObjectableModel;
use KekecMed\Core\Abstracts\Models\Presentable\Presentable;
use KekecMed\Core\Abstracts\Models\Presentable\PresentableModel;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Notice\Entities\Presenters\NoticePresenter;

/**
 * Class Notice
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 */
class Notice extends AbstractModel implements Presentable, Dialogable
{

    use PresentableModel, ObjectableModel;

    /**
     * Fillable Attributes
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'creator_id',
        'object_id',
        'object_type'
    ];

    /**
     * Get creator of media object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get Presenter Class
     *
     * @return AbstractPresenter
     */
    public function getPresenterClass()
    {
        return NoticePresenter::class;
    }

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        return Notice::list('title', 'id');
    }
}