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

    /**
     * Returns item by name.
     *
     * @param string $name item name.
     *
     * @return mixed item value.
     */
    public function getItem($name)
    {
        return $this->_items[$name];
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

    public function mergeItem($name, array $value)
    {
        if (!is_null($name)) {
            $this->_items[$name] = Helper::merge($this->_items[$name], $value);
        }
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
     * Get specified items as array.
     *
     * @param  mixed $keys specification
     *
     * @return array list of items
     */
    public function getItems($keys = null)
    {
        if (is_null($keys)) {
            return $this->_items;
        } elseif (is_scalar($keys)) {
            $keys = [$keys => $this->_items[$keys]];
        }
        $res = [];
        foreach ($keys as $k) {
            $res[$k] = $this->_items[$k];
        }
        return $res;
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

    public function mergeItems(array $items)
    {
        $this->_items = Helper::merge($this->_items, $items);
    }

    /**
     * Unset specified items.
     *
     * @param  mixed $keys specification
     *
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
     * Returns number of items in the collection
     *
     * @return int
     */
    public function count() {
        return count($this->_items);
    }
}
