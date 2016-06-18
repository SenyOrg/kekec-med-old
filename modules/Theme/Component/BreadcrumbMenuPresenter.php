<?php namespace KekecMed\Theme\Component;

use Pingpong\Menus\Presenters\Presenter;

/**
 * Class BreadcrumbMenuPresenter
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Theme\Component
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class BreadcrumbMenuPresenter extends Presenter implements \Pingpong\Menus\Presenters\PresenterInterface
{
    /**
     * Counts calls on getMenuWithoutDropdownWrapper()
     * to prevent  " » " on first element.
     *
     * @var int
     */
    private $count = 0;

    /**
     * {@inheritdoc }
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL . '<li><a href="javascript:void(0)" class="text-bold bg-light-blue" style="font-size: 10px !important">' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getCloseTagWrapper()
    {
        return PHP_EOL . '</a></li>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        return (($this->count++) ? ' » ' : '') . '<span onClick="window.location=\'' . $item->getUrl() . '\'">' . $item->getIcon() . ' ' . str_limit($item->title,
            20) . '</span>';
    }

    /**
     * {@inheritdoc }
     */
    public function getActiveState($item)
    {

    }

    /**
     * {@inheritdoc }
     */
    public function getDividerWrapper()
    {
        return '<li class="divider"></li>';
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithDropDownWrapper($item)
    {

    }
}