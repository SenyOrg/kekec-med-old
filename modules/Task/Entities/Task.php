<?php namespace KekecMed\Task\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Patient\Entities\Patient;

/**
 * Class Task
 * -----------------------------
 *
 * -----------------------------
 * @package App
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class Task extends Model
{
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
    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get assigned user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee() {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * Get related patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function object() {
        return $this->belongsTo(Patient::class, 'object_id');
    }

}
