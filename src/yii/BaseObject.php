<?php
/**
 * Collection library for Yii2.
 *
 * @link      https://github.com/hiqdev/yii2-collection
 * @package   yii2-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\collection\yii;

use ArrayAccess;
use IteratorAggregate;
use yii\base\Arrayable;

/**
 * Collection BaseObject.
 * Simply holds items.
 *
 * @implements ArrayAccess<array-key, mixed>
 * @implements IteratorAggregate<array-key, mixed>
 */
class BaseObject extends \yii\base\BaseObject implements ArrayAccess, IteratorAggregate, Arrayable
{
    use ObjectTrait;
}
