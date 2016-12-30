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
 * Array Helper.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class ArrayHelper
{
    /**
     * Recursive safe merge.
     * Based on Yii2 yii\helpers\BaseArrayHelper::merge.
     *
     * Merges two or more arrays into one recursively.
     * If each array has an element with the same string key value, the latter
     * will overwrite the former (different from array_merge_recursive).
     * Recursive merging will be conducted if both arrays have an element of array
     * type and are having the same key.
     * For integer-keyed elements, the elements from the latter array will
     * be appended to the former array.
     *
     * @param array $a array to be merged to
     * @param array $b array to be merged from
     * @return array the merged array
     */
    public static function merge($a, $b)
    {
        $args = func_get_args();
        $res = array_shift($args);
        foreach ($args as $items) {
            if (!is_array($items)) {
                continue;
            }
            foreach ($items as $k => $v) {
                if (is_int($k)) {
                    if (isset($res[$k])) {
                        $res[] = $v;
                    } else {
                        $res[$k] = $v;
                    }
                } elseif (is_array($v) && isset($res[$k]) && is_array($res[$k])) {
                    $res[$k] = self::merge($res[$k], $v);
                } else {
                    $res[$k] = $v;
                }
            }
        }

        return $res;
    }

    /**
     * Get specified items as array.
     * @param mixed $keys specification
     * @return array
     */
    public static function getItems($array, $keys = null)
    {
        if (is_null($keys)) {
            return $array;
        } elseif (is_scalar($keys)) {
            $keys = [$keys => $array[$keys]];
        }
        $res = [];
        foreach ($keys as $k) {
            if (array_key_exists($k, $array)) {
                $res[$k] = $array[$k];
            }
        }
        return $res;
    }

    /**
     * Inserts items in front of array.
     * rough method: unset and then set, think of better.
     */
    public static function insertLast(array $array, array $items)
    {
        foreach ($items as $k => $v) {
            unset($array[$k]);
        }
        foreach ($items as $k => $v) {
            $array[$k] = $v;
        }

        return $array;
    }

    /**
     * Inserts items in front of array.
     * rough method: unset and then set, think of better.
     */
    public static function insertFirst(array $array, array $items)
    {
        foreach (array_keys($items) as $k) {
            unset($array[$k]);
        }
        $array = array_merge($items, $array);

        return $array;
    }

    /**
     * Inserts items inside of array.
     * rough method: unset and then set, think of better.
     * @param array        $array source array
     * @param array        $items array of items
     * @param string|array $where where to insert
     * @return array new items list
     * @see add()
     */
    public static function insertInside(array $array, $items, $where)
    {
        foreach ($items as $k => $v) {
            unset($array[$k]);
        }
        $before = self::prepareWhere($array, isset($where['before']) ? $where['before'] : null);
        $after  = self::prepareWhere($array, isset($where['after']) ? $where['after'] : null);
        $new    = [];
        $found  = false;
        /// TODO think of realizing it better
        foreach ($array as $k => $v) {
            if (!$found && $k === $before) {
                foreach ($items as $i => $c) {
                    $new[$i] = $c;
                }
                $found = true;
            }
            $new[$k] = $v;
            if (!$found && $k === $after) {
                foreach ($items as $i => $c) {
                    $new[$i] = $c;
                }
                $found = true;
            }
        }
        if (!$found) {
            foreach ($items as $i => $c) {
                $new[$i] = $c;
            }
        }

        return $new;
    }

    /**
     * Internal function to prepare where list for insertInside.
     * @param array        $array source array
     * @param array|string $list  array to convert
     * @return array
     */
    protected static function prepareWhere(array $array, $list)
    {
        if (!is_array($list)) {
            $list = [$list];
        }
        foreach ($list as $v) {
            if (array_key_exists($v, $array)) {
                return $v;
            }
        }

        return null;
    }

    /**
     * Recursively removes duplicate values from non-associative arrays.
     */
    public static function unique($array)
    {
        $suitable = true;
        foreach ($array as $k => &$v) {
            if (is_array($v)) {
                $v = self::unique($v);
            } elseif (!is_int($k)) {
                $suitable = false;
            }
        }

        return $suitable ? self::uniqueFlat($array) : $array;
    }

    /**
     * Non-recursively removes duplicate values from non-associative arrays.
     */
    public static function uniqueFlat($array)
    {
        $uniqs = [];
        $res = [];
        foreach ($array as $k => $v) {
            $uv = var_export($v, true);
            if (array_key_exists($uv, $uniqs)) {
                continue;
            }
            $uniqs[$uv] = 1;
            $res[$k] = $v;
        }

        return $res;
    }

    public static function toArray($object)
    {
        $res = (array) $object;
        foreach ($res as &$v) {
            if (is_object($v)) {
                $v = self::toArray($v);
            }
        }

        return $res;
    }
}
