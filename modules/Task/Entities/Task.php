<?php namespace KekecMed\Task\Entities;

use App\User;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\ObjectableModel;
use KekecMed\Core\Abstracts\Models\Presentable;
use KekecMed\Core\Abstracts\Models\PresentableModel;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Abstracts\Models\Validatable;
use KekecMed\Core\Abstracts\Models\ValidatableModel;
use KekecMed\Core\Entities\Dialogable;
use KekecMed\Task\Entities\Presenters\TaskPresenter;

/**
 * Class Task
 * -----------------------------
 *
 * -----------------------------
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class Task extends AbstractModel implements Validatable, Dialogable, Presentable
{

    use ValidatableModel, PresentableModel, ObjectableModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'done',
        'creator_id',
        'assignee_id',
        'object_id',
    ];

    protected $casts = [
        'done' => 'boolean'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get creator of task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get assigned user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * Returns data for dialog view
     *
     * @return array
     */
    public function getDialogData()
    {
        return self::lists('title', 'id');
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
                'assignee_id' => 'required'
            ],
            'messages' => [
            ],
        ];
    }

    /**
     * Get Presenter Class
     *
     * @return AbstractPresenter
     */
    public function getPresenterClass()
    {
        return TaskPresenter::class;
    }
}
