<?php
/**
 * Collection library for PHP
 *
 * @link      https://github.com/hiqdev/php-collection
 * @package   php-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\collection\tests\unit;

use hiqdev\php\collection\Collection;

/**
 * Collection test suite.
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    use CollectionTestTrait;

    /**
     * @var Collection
     */
    protected $sample;

    protected function setUp()
    {
        $this->sample = new Collection($this->items);
    }

    protected function tearDown()
    {
        $this->sample = null;
    }
}
