<?php

namespace KekecMed\Core\Views;

use KekecMed\Core\Views\Elements\CheckboxSelect;
use KekecMed\Core\Views\Elements\Date;
use KekecMed\Core\Views\Elements\DateTime;
use KekecMed\Core\Views\Elements\Email;
use KekecMed\Core\Views\Elements\File;
use KekecMed\Core\Views\Elements\MobilePhone;
use KekecMed\Core\Views\Elements\MultiSelect;
use KekecMed\Core\Views\Elements\Password;
use KekecMed\Core\Views\Elements\Phone;
use KekecMed\Core\Views\Elements\RadioSelect;
use KekecMed\Core\Views\Elements\Select;
use KekecMed\Core\Views\Elements\Text;

/**
 * Class Elements
 *
 * This class is a simple factory for input elements
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package LKekecMed\Core\Views
 */
abstract class Elements
{
    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function text($parameters = null, $configuration = null, $attributes = null)
    {
        return Text::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function checkboxSelect($parameters = null, $configuration = null, $attributes = null)
    {
        return CheckboxSelect::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function date($parameters = null, $configuration = null, $attributes = null)
    {
        return Date::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function dateTime($parameters = null, $configuration = null, $attributes = null)
    {
        return DateTime::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function email($parameters = null, $configuration = null, $attributes = null)
    {
        return Email::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function file($parameters = null, $configuration = null, $attributes = null)
    {
        return File::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function mobilePhone($parameters = null, $configuration = null, $attributes = null)
    {
        return MobilePhone::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function multiSelect($parameters = null, $configuration = null, $attributes = null)
    {
        return MultiSelect::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function password($parameters = null, $configuration = null, $attributes = null)
    {
        return Password::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function phone($parameters = null, $configuration = null, $attributes = null)
    {
        return Phone::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function radioSelect($parameters = null, $configuration = null, $attributes = null)
    {
        return RadioSelect::factory($parameters, $configuration, $attributes);
    }

    /**
     * @param null $parameters
     * @param null $configuration
     * @param null $attributes
     *
     * @return static
     */
    public static function select($parameters = null, $configuration = null, $attributes = null)
    {
        return Select::factory($parameters, $configuration, $attributes);
    }
}