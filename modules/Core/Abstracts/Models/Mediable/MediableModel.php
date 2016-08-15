<?php namespace KekecMed\Core\Abstracts\Models\Mediable;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use KekecMed\Core\Abstracts\Models\AbstractModel;
use KekecMed\Media\Entities\Media;

/**
 * Class MediableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models\Mediable
 */
trait MediableModel
{
    /**
     * MediableDeleteHook
     *
     * @param AbstractModel $model
     */
    public function callMediableDelete(AbstractModel $model)
    {
        /** @var MediableModel $model */
        $model->media()->delete();
    }

    /**
     * Get related Notices
     *
     * @return MorphMany
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'object');
    }

    /**
     * MediableUpdateHook
     *
     * @param Mediable $u
     */
    public function callMediableUpdate(Mediable $u)
    {
        /** @var MediableModel $u */
        $mediaAttributes = $u->getMediaAttributes();
        $fileAttribute = $mediaAttributes['media'];
        $fileDescription = $mediaAttributes['mediaDescription'];
        $uploadPath = $u->getMediaFileUploadPath();

        if (\Request::file($fileAttribute) instanceof UploadedFile) {
            /** @var UploadedFile $fileObject */
            $fileObject = \Request::file($fileAttribute);

            $uniqueHashedName = md5(microtime() . $fileObject->hashName());
            $mediaModel = new Media([
                'filename'    => $fileObject->getClientOriginalName(),
                'filesize'    => $fileObject->getSize(),
                'filetype'    => $fileObject->getMimeType(),
                'path'        => $uploadPath . $uniqueHashedName,
                'description' => \Request::get($fileDescription),
                'creator_id'  => \Auth::user()->id,
            ]);

            /**
             * Save file
             */
            \Storage::put(
                'public/' . $uploadPath . $uniqueHashedName,
                file_get_contents($fileObject->getRealPath())
            );

            /**
             * Save new media
             */
            $u->media()->save($mediaModel);
        }
    }
}