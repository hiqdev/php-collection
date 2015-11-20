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

use ArrayIterator;

/**
 * Base Trait.
 */
trait BaseTrait
{
    /**
     * @var array default items
     */
    protected static $_defaults = [];

    /**
     * @var array items
     */
    protected $_items = [];

    /**
     * Straight put an item.
     *
     * @param string $name  item name.
     * @param array  $value item value.
     */
    public function putItem($name, $value = null)
    {
        if (is_null($name) || is_int($name)) {
            $this->_items[] = $value;
        } else {
            $this->_items[$name] = $value;
        }
    }

    /**
     * Get raw item.
     *
     * @param string $name item name.
     *
     * @return mixed item value.
     */
    public function rawItem($name, $default = null)
    {
        return isset($this->_items[$name]) ? $this->_items[$name] : $default;
    }

    /**
     * Adds an item. Doesn't touch if already exists.
     *
     * @param string       $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, @see setItem
     *
     * @return $this for chaining
     */
    public function addItem($name, $value = null, $where = '')
    {
        if (!$this->hasItem($name)) {
            $this->setItem($name, $value, $where);
        }

        return $this;
    }

    /**
     * Sets an item. Silently resets if already exists and mov.
     *
     * @param string       $name  item name.
     * @param array        $value item value.
     * @param string|array $where where to put, can be empty, first, last and array of before and after
     */
    public function setItem($name, $value = null, $where = '')
    {
        if ($name === null || $where === '') {
            $this->putItem($name, $value);
        } else {
            $this->setItems([$name => $value], $where);
        }
    }

    public function mergeItem($name, array $value)
    {
        if (!is_null($name)) {
            $this->_items[$name] = Helper::merge($this->_items[$name], $value);
        }
    }

    public function mergeItems(array $items)
    {
        $this->_items = Helper::merge($this->_items, $items);
    }

    /**
     * Check collection has the item.
     *
     * @param string $name item name.
     *
     * @return bool whether item exist.
     */
    public function hasItem($name)
    {
        return array_key_exists($name, $this->_items);
    }

    /**
     * Check is item set.
     *
     * @param string $name item name.
     *
     * @return bool whether item is set.
     */
    public function issetItem($name)
    {
        return isset($this->_items[$name]);
    }

    /**
     * Delete an item.
     *
     * @param $name
     */
    public function unsetItem($name)
    {
        unset($this->_items[$name]);
    }

    /**
     * Straight put items.
     *
     * @param array $items list of items
     *
     * @see setItem
     */
    public function putItems(array $items)
    {
        foreach ($items as $k => $v) {
            $this->putItem($k, $v);
        }
    }

    /**
     * Adds items to specified place.
     *
     * @param array $items list of items
     * @param mixed $where
     *
     * @see setItem()
     */
    public function setItems($items, $where = '')
    {
        if (!$items) {
            return;
        } elseif ($where === '') {
            $this->putItems($items);
        } elseif ($where === 'last') {
            $this->_items = Helper::insertLast  ($this->_items, $items);
        } elseif ($where === 'first') {
            $this->_items = Helper::insertFirst ($this->_items, $items);
        } else {
            $this->_items = Helper::insertInside($this->_items, $items, $where);
        }
    }

    /**
     * Adds items to specified place.
     * Does not touch those items that already exists.
     *
     * @param array        $items array of items.
     * @param string|array $where where to add. See [[setItem()]]
     *
     * @return $this for chaining
     *
     * @see setItem()
     */
    public function addItems(array $items, $where = '')
    {
        foreach ($items as $k => $v) {
            if (!is_int($k) && $this->hasItem($k)) {
                unset($items[$k]);
            }
        }
        if ($items) {
            $this->setItems($items, $where);
        }

        return $this;
    }

    /**
     * Get keys.
     *
     * @return array for chaining
     */
    public function keys()
    {
        return array_keys($this->_items);
    }

    /**
     * The default implementation of this method returns [[attributes()]] indexed by the same attribute names.
     *
     * @return array the list of field names or field definitions.
     *
     * @see toArray()
     */
    public function fields()
    {
        $fields = $this->keys();

        return array_combine($fields, $fields);
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
        if ($name && $this->canGetProperty($name)) {
            return parent::__get($name);
        } else {
            return $this->getItem($name);
        }
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
        if ($name && $this->canSetProperty($name)) {
            parent::__unset($name);
        } else {
            $this->unsetItem($name);
        }
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
     * This method is required by the SPL interface `ArrayAccess`.
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

    /**
     * Returns number of items in the collection
     *
     * @return int
     */
    public function count() {
        return count($this->_items);
    }
}
