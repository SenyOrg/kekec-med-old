<?php namespace KekecMed\Core\Http\Controllers;

use KekecMed\Theme\Component\ViewComponent;
use Pingpong\Modules\Routing\Controller;

/**
 * Class AbstractCoreController
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\Http\Controllers
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
abstract class AbstractCoreController extends Controller
{
    public function __construct()
    {
        // Set controller in ViewComponent
        ViewComponent::getInstance()->controller($this);
    }
}