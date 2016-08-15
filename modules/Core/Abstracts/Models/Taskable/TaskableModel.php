<?php namespace KekecMed\Core\Abstracts\Models\Taskable;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Task\Entities\Task;

/**
 * Class TaskableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models\Taskable
 */
trait TaskableModel
{
    /**
     * TaskableDeleteHook
     *
     * @param AbstractModel $model
     */
    public function callTaskableDelete(AbstractModel $model)
    {
        /** @var TaskableModel $model */
        $model->tasks()->delete();
    }

    /**
     * Get related Tasks
     *
     * @return MorphMany
     */
    public function tasks()
    {
        return $this->morphMany(Task::class, 'object');
    }
}