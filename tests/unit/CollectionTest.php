<?php

/*
 * Collection Library for Yii2
 *
 * @link      https://github.com/hiqdev/yii2-collection
 * @package   yii2-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (https://hiqdev.com/)
 */

namespace tests\unit;

use hiqdev\php\collection\CollectionTrait;

/**
 * Collection test suite.
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    use CollectionTestTrait;

    /**
     * @var NewCollection
     */
    protected $sample;

    protected function setUp()
    {
        $this->sample = new NewCollection;
    }

    protected function tearDown()
    {
        $this->sample = null;
    }
}

class NewCollection
{
    use CollectionTrait;
}
