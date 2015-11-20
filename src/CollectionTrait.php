<?php

/*
 * Collection Library for Yii2
 *
 * @link      https://github.com/hiqdev/yii2-collection
 * @package   yii2-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (https://hiqdev.com/)
 */

namespace hiqdev\php\collection;

use ArrayAccess;
use ArrayIterator;

/**
 * Collection Trait.
 * Array inside of object.
 */
trait CollectionTrait
{
    use BaseTrait;

    /**
     * Returns property of item by name.
     *
     * @param mixed $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->getItem($name);
    }

    /**
     * Sets an item. Silently resets if already exists.
     *
     * @param int|string   $name
     * @param mixed        $value the element value
     * @param string|array $where where to put, see [[setItem()]]
     *
     * @see setItem()
     */
    public function set($name, $value, $where = '')
    {
        $this->setItem($name, $value, $where);
    }

    /**
     * Adds an item. Does not touch if already exists.
     *
     * @param int|string   $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, see [[setItem()]]
     *
     * @return $this for chaining
     *
     * @see setItem()
     */
    public function add($name, $value = null, $where = '')
    {
        if (!$this->has($name)) {
            $this->set($name, $value, $where);
        }

        return $this;
    }
    /**
     * Check collection has the item.
     *
     * @param string $name item name.
     *
     * @return bool whether item exist.
     */
    public function has($name)
    {
        return $this->hasItem($name);
    }

    /**
     * Delete an item.
     * You can't create function `unset`
     *
     * @param $name
     */
    public function delete($name)
    {
        $this->unsetItem($name);
    }

    /**
     * This method is overridden to support accessing items like properties.
     *
     * @param string $name item or property name
     *
     * @return mixed item of found or the named property value
     */
    public function __get($name)
    {
        return $this->getItem($name);
    }

    /**
     * This method is overridden to support accessing items like properties.
     *
     * @param string $name  item or property name
     * @param string $value value to be set
     *
     * @return mixed item of found or the named property value
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     *
     * @param string $name the property name or the event name
     *
     * @return bool whether the property value is null
     */
    public function __isset($name)
    {
        return ($name && parent::__isset($name)) || $this->issetItem($name);
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     *
     * @param string $name the property name or the event name
     *
     * @return bool whether the property value is null
     */
    public function __unset($name)
    {
        $this->unsetItem($name);
    }

    /**
     * Returns the element at the specified offset.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `$value = $collection[$offset];`.
     *
     * @param mixed $offset the offset to retrieve element.
     *
     * @return mixed the element at the offset, null if no element is found at the offset
     */
    public function offsetGet($offset)
    {
        return $this->getItem($offset);
    }

    /**
     * Sets the element at the specified offset.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `$collection[$offset] = $value;`.
     *
     * @param int   $offset the offset to set element
     * @param mixed $value  the element value
     */
    public function offsetSet($offset, $value)
    {
        $this->setItem($offset, $value);
    }

    /**
     * Returns whether there is an element at the specified offset.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `isset($collection[$offset])`.
     *
     * @param mixed $offset the offset to check on
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->hasItem($offset);
    }

    /**
     * Sets the element value at the specified offset to null.
     * This method is required by the SPL interface ArrayAccess.
     * It is implicitly called when you use something like `unset($collection[$offset])`.
     *
     * @param mixed $offset the offset to unset element
     */
    public function offsetUnset($offset)
    {
        $this->unsetItem($offset);
    }

    /**
     * Method for IteratorAggregate interface.
     * Enables foreach'ing the object.
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_items);
    }

}
