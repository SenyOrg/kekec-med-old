<?php

namespace KekecMed\Media\Entities\Presenters;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Views\Elements;
use KekecMed\Core\Views\Forms\FormElement;

/**
 * Class MediaPresenter
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Patient\Presenters
 */
class MediaPresenter extends AbstractPresenter
{
    /**
     * Firstname
     *
     * @return static
     */
    public function getFilename()
    {
        return FormElement::factory('Filename', Elements::text([
            'name'  => 'filename',
            'value' => $this->getModel()->filename
        ]))->render('view');
    }

    /**
     * Firstname
     *
     * @return static
     */
    public function getFilesize()
    {
        return FormElement::factory('Filename', Elements::text([
            'name'  => 'filesize',
            'value' => $this->getModel()->filesize . ' Byte(s)'
        ]))->render('view');
    }

    /**
     * Firstname
     *
     * @return static
     */
    public function getFiletype()
    {
        return FormElement::factory('Filetype', Elements::text([
            'name'  => 'filetype',
            'value' => $this->getModel()->filetype
        ]))->render('view');
    }

    /**
     * Firstname
     *
     * @return static
     */
    public function getDescription()
    {
        return FormElement::factory('Description', Elements::text([
            'name'  => 'description',
            'value' => $this->getModel()->description
        ]))->render($this->getViewMode());
    }

    /**
     * Get Representable String
     *
     * @return string
     */
    public function getRepresentable()
    {
        return $this->getModel()->filename;
    }
}