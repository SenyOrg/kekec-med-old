<?php namespace KekecMed\Theme\Component;

use Pingpong\Menus\Presenters\Presenter;

/**
 * Class AdminLTEMenuPresenter
 * -----------------------------
 * 
 * -----------------------------
 * @package KekecMed\Theme\Component
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class AdminLTEMenuPresenter extends Presenter implements \Pingpong\Menus\Presenters\PresenterInterface
{
    /**
     * {@inheritdoc }
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL . '<ul class="sidebar-menu">' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getCloseTagWrapper()
    {
        return PHP_EOL . '</ul>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        return '<li' . $this->getActiveState($item) . '><a href="' . $item->getUrl() . '">'. $item->getIcon() . ' <span>' . $item->title . '</span></a></li>';
    }

    /**
     * {@inheritdoc }
     */
    public function getActiveState($item)
    {
        return \Request::is($item->getRequest()) ? ' class="active"' : null;
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
        return '<li class="treeview">
    <a href="#">
        ' . $item->getIcon() . '<span>' . $item->title . '</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        ' . $this->getChildMenuItems($item) . '
    </ul>
</li>' . PHP_EOL;
    }
}