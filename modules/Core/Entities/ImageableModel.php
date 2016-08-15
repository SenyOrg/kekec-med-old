<?php

namespace KekecMed\Core\Entities;

use Illuminate\Http\UploadedFile;

/**
 * Trait AbstractImageFullModel
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\Entities
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
trait ImageableModel
{
    /**
     * Array of attribute identifiers
     * that are file ressources
     *
     * @var array
     */
    protected $images = [
        'image'
    ];

    /**
     * AbstractImageFullModel constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        // Call parent __construct
        parent::__construct($attributes);

        // Callback
        $callback = function ($u) {
            if (!is_array($u->images)) {
                $u->images = [$u->images];
            }

            foreach ($u->images as $image) {
                if ($u->getAttribute($image) instanceof UploadedFile && $u->getAttribute($image) != $u->getOriginal($image)) {
                    \Storage::delete('public/' . $u->getOriginal($image));

                    /* Get image and resize it */
                    $imageObj = $u->getAttribute($image);
                    \Image::make($imageObj->getRealPath())
                          ->resize(160, 160)
                          ->save($imageObj->getRealPath());

                    \Storage::put(
                        'public/' . $imageObj->hashName(),
                        file_get_contents($imageObj->getRealPath())
                    );

                    $u->setAttribute($image, $imageObj->hashName());
                }
            }
        };

        // Register callback
        $this->updating($callback);
        $this->creating($callback);
        $this->deleting(function ($u) {
            if (!is_array($u->images)) {
                $u->images = [$u->images];
            }

            foreach ($this->images as $image) {
                \Storage::delete('public/' . $u->getAttribute($image));
            }
        });
    }

    /**
     * Get image url
     *
     * @param int $key
     */
    public function getImageUrl($key = null)
    {
        if (isset($key)) {
            return \Storage::url($this->image);
        }
    }


}