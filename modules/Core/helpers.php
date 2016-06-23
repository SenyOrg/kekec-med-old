<?php

/**
 * Some helper functions
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */

/**
 * Returns default if given value is null
 *
 * @param mixed $value
 * @param mixed $default
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @return mixed
 */
function defNull($value, $default)
{
    if ($value === null) {
        return $default;
    }

    return $value;
}

/**
 * Returns default if given value is an empty string
 *
 * @param $value
 * @param $default
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @return string
 */
function defEmptyString($value, $default)
{
    if (empty($value)) {
        return $default;
    }

    return $value;
}