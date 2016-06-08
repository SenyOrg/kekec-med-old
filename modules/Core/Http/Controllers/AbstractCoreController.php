<?php namespace KekecMed\Core\Http\Controllers;

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
        view()->share('controller', $this);
    }
}