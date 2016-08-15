<?php namespace KekecMed\Core\Abstracts\Providers;

use KekecMed\Core\Abstracts\Providers\Modules\Commandable;
use KekecMed\Core\Abstracts\Providers\Modules\Configable;
use KekecMed\Core\Abstracts\Providers\Modules\Eventable;
use KekecMed\Core\Abstracts\Providers\Modules\Translateable;
use KekecMed\Core\Abstracts\Providers\Modules\Viewable;

/**
 * Class AbstractFullstackModuleProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Providers
 */
abstract class AbstractFullstackModuleProvider extends AbstractModuleProvider
    implements Commandable, Configable, Eventable, Translateable, Viewable
{

}