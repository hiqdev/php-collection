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

/**
 * Collection Trait.
 * Array inside of object.
 */
trait CollectionTrait
{
    use BaseTrait;

    /**
     * Returns property of item by name.
     * @param mixed $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->getItem($name);
    }

    /**
     * Sets an item. Silently resets if already exists.
     * @param int|string   $name
     * @param mixed        $value the element value
     * @param string|array $where where to put, see [[setItem()]]
     * @see setItem()
     */
    public function set($name, $value, $where = '')
    {
        $this->setItem($name, $value, $where);
    }

    /**
     * Adds an item. Does not touch if already exists.
     * @param int|string   $name  item name
     * @param array        $value item value
     * @param string|array $where where to put, see [[setItem()]]
     * @return $this for chaining
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
     * @param string $name item name
     * @return bool whether item exist
     */
    public function has($name)
    {
        return $this->hasItem($name);
    }

    /**
     * Delete an item.
     * You can't create function `unset`.
     * @param $name
     */
    public function delete($name)
    {
        $this->unsetItem($name);
    }

    /**
     * This method is overridden to support accessing items like properties.
     * @param string $name item or property name
     * @return mixed item of found or the named property value
     */
    public function __get($name)
    {
        return $this->getItem($name);
    }

    /**
     * This method is overridden to support accessing items like properties.
     * @param string $name  item or property name
     * @param string $value value to be set
     * @return mixed item of found or the named property value
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     * @param string $name the property name or the event name
     * @return bool whether the property value is null
     */
    public function __isset($name)
    {
        return ($name && parent::__isset($name)) || $this->issetItem($name);
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named item is loaded.
     * @param string $name the property name or the event name
     * @return bool whether the property value is null
     */
    public function __unset($name)
    {
        $this->unsetItem($name);
    }
}
