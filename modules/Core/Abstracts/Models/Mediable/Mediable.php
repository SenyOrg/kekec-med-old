<?php namespace KekecMed\Core\Abstracts\Models\Mediable;

/**
 * Interface Mediable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models\Mediable
 */
interface Mediable
{
    /**
     * Get path to upload directory
     *
     * @return string
     */
    public function getMediaFileUploadPath();

    /**
     * Get attribute to watch in request
     *
     * @return array
     */
    public function getMediaAttributes();
}