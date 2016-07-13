<?php

namespace KekecMed\Notice\Entities\Presenters;

use KekecMed\Core\Abstracts\Models\Noticeable\Noticeable;
use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Views\Elements;
use KekecMed\Core\Views\Forms\FormElement;

/**
 * Class NoticePresenter
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Entities\Presenters
 */
class NoticePresenter extends AbstractPresenter
{
    /**
     *
     * 'title',
     * 'body',
     * 'creator_id',
     * 'object_id',
     * 'object_type'
     */

    /**
     * Firstname
     *
     * @return static
     */
    public function getTitle()
    {
        return FormElement::factory('Title', Elements::text([
            'name'  => 'title',
            'value' => $this->getModel()->title
        ]))->render($this->getViewMode());
    }

    /**
     * Firstname
     *
     * @return static
     */
    public function getBody()
    {
        return FormElement::factory('Body', Elements::text([
            'name'  => 'body',
            'value' => $this->getModel()->body
        ]))->render($this->getViewMode());
    }

    /**
     * Get Creator
     *
     * @return static
     */
    public function getCreator()
    {
        return FormElement::factory('Creator', Elements::select([
            'name'  => 'creator_id',
            'value' => $this->getModel()->creator_id,
            'model' => $this->getModel()->creator()
        ]))->render($this->getViewMode());
    }

    /**
     * Get related Object
     *
     * @param string $selectedObject Format: {NAMESPACED_MODEL}-{MODEL_ID}
     *
     * @return static
     */
    public function getObject($selectedObject = null)
    {
        if (!isset($selectedObject)) {
            $selectedObject = $this->getModel()->object_type . '-' . $this->getModel()->object_id;
        }

        return FormElement::factory('Object', Elements::object([
            'name'      => 'object_id',
            'interface' => Noticeable::class,
            'value'     => $selectedObject,
            'model'     => $this->getModel()->object()
        ]))->render($this->getViewMode());
    }


    /**
     * Get Representable String
     *
     * @return string
     */
    public function getRepresentable()
    {
        return $this->getModel()->title;
    }
}