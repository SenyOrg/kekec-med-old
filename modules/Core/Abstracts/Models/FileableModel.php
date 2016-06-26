<?php namespace KekecMed\Core\Abstracts\Models;

use Illuminate\Http\UploadedFile;

/**
 * Trait FileableModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
trait FileableModel
{
    /**
     * @param Fileable $u
     *
     * @return mixed
     */
    public function callFileableUpdate(Fileable $u)
    {
        /** @var FileableModel $u */
        $closures = $u->getFileableClosures();

        return $closures['update']($u);
    }

    /**
     * @return array
     */
    public function getFileableClosures()
    {
        return [
            'update' => function (Fileable $u) {
                /** @var FileableModel $u */
                $fileAttributes = $u->getFileAttributes();

                foreach ($fileAttributes as $fileAttribute) {
                    if ($u->getAttribute($fileAttribute) instanceof UploadedFile && $u->getAttribute($fileAttribute) != $u->getOriginal($fileAttribute)) {
                        if ($u->getOriginal($fileAttribute)) {
                            /**
                             * Delete previous file
                             */
                            \Storage::delete('public/' . $u->getOriginal($fileAttribute));
                        }

                        /** @var UploadedFile $fileObject */
                        $fileObject = $u->getAttribute($fileAttribute);

                        /**
                         * Is UploadedFile an Image?
                         */
                        if (substr($fileObject->getMimeType(), 0, 5) == 'image') {
                            /**
                             * Resize image
                             */
                            \Image::make($fileObject->getRealPath())
                                  ->resize(160, 160)
                                  ->save($fileObject->getRealPath());
                        }

                        /**
                         * Save file
                         */
                        \Storage::put(
                            'public/' . $fileObject->hashName(),
                            file_get_contents($fileObject->getRealPath())
                        );

                        $u->setAttribute($fileAttribute, $fileObject->hashName());
                    }
                }
            },
            'delete' => function (Fileable $u) {
                /** @var FileableModel $u */
                $fileAttributes = $u->getFileAttributes();

                foreach ($fileAttributes as $fileAttribute) {
                    \Storage::delete('public/' . $u->getAttribute($fileAttribute));
                }
            }
        ];
    }

    /**
     * @param Fileable $u
     *
     * @return mixed
     */
    public function callFileableDelete(Fileable $u)
    {
        /** @var FileableModel $u */
        $closures = $u->getFileableClosures();

        return $closures['delete']($u);
    }

    /**
     * Get path to file
     *
     * @param $fileAttribute
     *
     * @return string
     * @throws \Exception
     */
    public function getFileUrl($fileAttribute)
    {
        if (in_array($fileAttribute, $this->getFileAttributes())) {
            if (\Storage::exists('public/' . $this->getAttribute($fileAttribute))) {
                return \Storage::url($this->getAttribute($fileAttribute));
            } else {
                /**
                 * @todo: Return a default resource
                 */
                return asset('modules/theme/admin-lte/dist/img/avatar.png');
            }
        }

        throw new \Exception('Retrieved Attribute is not a file resource.');
    }
}