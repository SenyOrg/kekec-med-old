<?php

namespace KekecMed\Event\Entities\Presenters;

use KekecMed\Core\Abstracts\Models\Presenter\AbstractPresenter;
use KekecMed\Core\Views\Elements;
use KekecMed\Core\Views\Forms\FormElement;

/**
 * Class EventPresenter
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Event\Entities\Presenters
 */
class EventPresenter extends AbstractPresenter
{
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
    public function getDescription()
    {
        return FormElement::factory('Description', Elements::text([
            'name'  => 'description',
            'value' => $this->getModel()->description
        ]))->render($this->getViewMode());
    }

    /**
     * Get Gender
     *
     * @return static
     */
    public function getDeadline()
    {
        return FormElement::factory('Deadline', Elements::date([
            'name'  => 'deadline',
            'value' => $this->getModel()->deadline,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Birthdate
     *
     * @return static
     */
    public function getDone()
    {
        return FormElement::factory('Done', Elements::radioSelect([
            'name'    => 'done',
            'options' => [0 => 'Nein', 1 => 'Ja'],
            'value'   => $this->getModel()->done,
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance Type
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
     * Get Insurance Type
     *
     * @return static
     */
    public function getAssignee()
    {
        return FormElement::factory('Assignee', Elements::select([
            'name'  => 'assignee_id',
            'value' => $this->getModel()->assignee_id,
            'model' => $this->getModel()->assignee()
        ]))->render($this->getViewMode());
    }

    /**
     * Get Insurance Type
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

        return FormElement::factory('Patient', Elements::object([
            'name'      => 'object_id',
            'interface' => Taskable::class,
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
        return str_limit($this->getModel()->title, 100);
    }
}