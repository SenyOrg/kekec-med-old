<?php namespace KekecMed\Media\Entities;

use App\User;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Core\Abstracts\Models\ObjectableModel;
use KekecMed\Core\Abstracts\Models\Presentable\Presentable;
use KekecMed\Core\Abstracts\Models\Presentable\PresentableModel;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Media\Entities\Presenters\MediaPresenter;

/**
 * Class Media
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities
 */
class Media extends AbstractModel implements Presentable
{

    use PresentableModel, ObjectableModel;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'medias';
    /**
     * Model Attributes
     *
     * @var array
     */
    protected $fillable = [
        'filename',
        'filetype',
        'filesize',
        'path',
        'description',
        'creator_id',
        'object_id',
        'object_type',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {

        /**
         * @todo
         *
         * We should find a better solution for that
         * because we overwrite common hooks registerd
         * in abstract model here.
         */
        parent::boot();

        /**
         * DeleteHook
         */
        static::deleting(function (Media $u) {
            /**
             * This will delete file on storage
             * when model will be deleted
             */
            \Storage::delete('public/' . $u->getAttribute('path'));
        });
    }

    /**
     * Get related object
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function object()
    {
        return $this->morphTo('object');
    }

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
        return MediaPresenter::class;
    }

    /**
     * Get Download Link
     *
     * @return mixed
     */
    public function getDownloadlink()
    {
        return route('media.download', ['id' => $this->id]);
    }

    /**
     * Get Deletion Link
     *
     * @return mixed
     */
    public function getDeletelink()
    {
        return route('media.delete', ['id' => $this->id]);
    }
}