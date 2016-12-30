<?php
/**
 * Collection library for PHP
 *
 * @link      https://github.com/hiqdev/php-collection
 * @package   php-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\collection;

use ArrayIterator;

/**
 * Base Trait.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
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
     * @param string $name  item name
     * @param array  $value item value
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
     * @param string $name item name
     * @return mixed item value
     */
    public function rawItem($name, $default = null)
    {
        return isset($this->_items[$name]) ? $this->_items[$name] : $default;
    }

    /**
     * Adds an item. Doesn't touch if already exists.
     * @param string       $name  item name
     * @param array        $value item value
     * @param string|array $where where to put, @see setItem
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
     * @param string       $name  item name
     * @param array        $value item value
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

    /**
     * Returns item by name.
     * @param string $name item name
     * @param mixed $default default value
     * @return mixed item value or default
     */
    public function getItem($name, $default = null)
    {
        return isset($this->_items[$name]) ? $this->_items[$name] : $default;
    }

    /**
     * Check collection has the item.
     * @param string $name item name
     * @return bool whether item exist
     */
    public function hasItem($name)
    {
        return array_key_exists($name, $this->_items);
    }

    public function mergeItem($name, array $value)
    {
        if (!is_null($name)) {
            $this->_items[$name] = ArrayHelper::merge($this->_items[$name], $value);
        }
    }

    /**
     * Check is item set.
     * @param string $name item name
     * @return bool whether item is set
     */
    public function issetItem($name)
    {
        return isset($this->_items[$name]);
    }

    /**
     * Delete an item.
     * @param $name
     */
    public function unsetItem($name)
    {
        unset($this->_items[$name]);
    }

    /**
     * Get specified items as array.
     * @param mixed $keys specification
     * @return array list of items
     */
    public function getItems($keys = null)
    {
        return ArrayHelper::getItems($this->_items, $keys);
    }

    /**
     * Straight put items.
     * @param array $items list of items
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
     * @param array $items list of items
     * @param mixed $where
     * @see setItem()
     */
    public function setItems($items, $where = '')
    {
        if (empty($items)) {
            return;
        }
        if (empty($where)) {
            $this->putItems($items);
        } elseif ($where === 'last') {
            $this->_items = ArrayHelper::insertLast($this->_items, $items);
        } elseif ($where === 'first') {
            $this->_items = ArrayHelper::insertFirst($this->_items, $items);
        } else {
            $this->_items = ArrayHelper::insertInside($this->_items, $items, $where);
        }
    }

    /**
     * Adds items to specified place.
     * Does not touch those items that already exists.
     * @param array        $items array of items
     * @param string|array $where where to add. See [[setItem()]]
     * @return $this for chaining
     * @see setItem()
     */
    public function addItems(array $items, $where = '')
    {
        foreach (array_keys($items) as $k) {
            if (!is_int($k) && $this->hasItem($k)) {
                unset($items[$k]);
            }
        }
        if (!empty($items)) {
            $this->setItems($items, $where);
        }

        return $this;
    }

    public function mergeItems(array $items)
    {
        $this->_items = ArrayHelper::merge($this->_items, $items);
    }

    /**
     * Unset specified items.
     * @param mixed $keys specification
     * @return array list of items
     */
    public function unsetItems($keys = null)
    {
        if (is_null($keys)) {
            $this->_items = [];
        } elseif (is_scalar($keys)) {
            unset($this->_items[$keys]);
        } else {
            foreach ($keys as $k) {
                unset($this->_items[$k]);
            }
        }
    }

    public function resetItems(array $items)
    {
        $this->_items = $items;
    }

    /**
     * Get keys.
     * @return array for chaining
     */
    public function keys()
    {
        return array_keys($this->_items);
    }

    /**
     * The default implementation of this method returns [[attributes()]] indexed by the same attribute names.
     * @return array the list of field names or field definitions
     * @see toArray()
     */
    public function fields()
    {
        $fields = $this->keys();

        return array_combine($fields, $fields);
    }

    /**
     * Returns number of items in the collection.
     * @return int
     */
    public function count()
    {
        return count($this->_items);
    }

    /**
     * Returns the element at the specified offset.
     * This method is required by the SPL interface `ArrayAccess`.
     * It is implicitly called when you use something like `$value = $collection[$offset];`.
     * @param mixed $offset the offset to retrieve element
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
     * @param mixed $offset the offset to check on
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
     * @param mixed $offset the offset to unset element
     */
    public function offsetUnset($offset)
    {
        $this->unsetItem($offset);
    }

    /**
     * Method for IteratorAggregate interface.
     * Enables foreach'ing the object.
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_items);
    }
}
