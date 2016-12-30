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

use ArrayAccess;
use IteratorAggregate;

/**
 * Collection class.
 */
class Collection implements ArrayAccess, IteratorAggregate
{
    use CollectionTrait;

    public function __construct(array $items = [])
    {
        $this->_items = $items;
    }
}
