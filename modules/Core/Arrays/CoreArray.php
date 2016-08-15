<?php

namespace KekecMed\Core\Arrays;

/**
 * Class CoreArray
 *
 * Immutable Array Implementation
 * with DotNotation Access.
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Arrays
 */
class CoreArray implements \ArrayAccess
{
    /**
     * Store array
     *
     * @var array
     */
    private $store = null;

    /**
     * CoreArray constructor.
     *
     * @param array $store
     */
    public function __construct(array $store)
    {
        /**
         * Save store
         */
        $this->store = $store;
    }

    /**
     * Factory
     *
     * @param array $store
     *
     * @return CoreArray
     */
    public static function factory(array $store)
    {
        return new self($store);
    }

    /**
     * Get whole store
     *
     * @return array
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Whether a offset exists
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * Offset to retrieve
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Get key from store
     *
     * @param      $key
     * @param null $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_get($this->store, $key, $default);
    }

    /**
     * Offset to set
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @throws \Exception
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        throw new \Exception('CoreArrays are immutable. Please take the store via getStore() and manipulate it manually.');
    }

    /**
     * Offset to unset
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @throws \Exception
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        throw new \Exception('CoreArrays are immutable. Please take the store via getStore() and manipulate it manually.');
    }
}