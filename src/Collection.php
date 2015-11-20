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
