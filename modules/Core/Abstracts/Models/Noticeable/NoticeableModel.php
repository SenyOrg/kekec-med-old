<?php namespace KekecMed\Core\Abstracts\Models\Noticeable;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Notice\Entities\Notice;

/**
 * Class NoticeableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models\Noticeable
 */
trait NoticeableModel
{
    /**
     * NoticeableDeleteHook
     *
     * @param AbstractModel $model
     */
    public function callNoticeableDelete(AbstractModel $model)
    {
        /** @var NoticeableModel $model */
        $model->notices()->delete();
    }

    /**
     * Get related Notices
     *
     * @return MorphMany
     */
    public function notices()
    {
        /** @var AbstractModel $this */
        return $this->morphMany(Notice::class, 'object');
    }
}