<?php
/**
 * Collection library for PHP.
 *
 * @link      https://github.com/hiqdev/php-collection
 * @package   php-collection
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\collection\tests\unit;

use hiqdev\php\collection\ArrayHelper;

/**
 * ArrayHelper test suite.
 */
class ArrayHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function merge()
    {
        $a = [
            'foo' => 'bar',
            'bar' => 'baz',
            'baz' => [
                'baz-foo' => false,
                'baz-bar' => false,
            ],
            'qux' => [
                'qux-foo',
            ],
        ];
        $b = [
            'bar' => 'qux',
            'baz' => [
                'baz-bar' => true,
            ],
            'qux' => [
                'qux-bar',
            ],
        ];
        $c = [
            'baz' => [
                'baz-foo' => true,
            ],
            'qux' => [
                'qux-baz',
            ],
            'bar',
            'baz',
        ];
        
        $actual = ArrayHelper::merge($a, $b, $c);
        $expected = [
            'foo' => 'bar',
            'bar' => 'qux',
            'baz' => [
                'baz-foo' => true,
                'baz-bar' => true,
            ],
            'qux' => [
                'qux-foo',
                'qux-bar',
                'qux-baz',
            ],
            'bar',
            'baz',
        ];
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @test
     */
    public function getItems()
    {
        $data = [
            'foo' => 'bar',
            'bar' => 'qux',
        ];
        
        $actual = ArrayHelper::getItems($data, 'foo');
        $expected = [
            'bar' => 'qux',
        ];
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @test
     */
    public function insertInside()
    {
        $data = [
            'foo' => 'bar',
            'bar' => 'qux',
        ];
        
        $items = [
            'bar' => 'foo',
            'qux' => 'bar',
        ];
        
        $expected = [
            'foo' => 'bar',
            'bar' => 'foo',
            'qux' => 'bar',
        ];
        
        $actual = ArrayHelper::insertInside($data, $items, []);
        $this->assertEquals($expected, $actual);
        
        $actual = ArrayHelper::insertInside($data, $items, ['before' => 'foo']);
        $this->assertEquals($expected, $actual);
        
        $actual = ArrayHelper::insertInside($data, $items, ['after' => 'foo']);
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @test
     */
    public function unique()
    {
        $data = [
            'foo',
            'foo',
            'bar',
            [
                'foo' => 'bar',
                'foo' => 'bar',
            ],
        ];
        
        $actual = ArrayHelper::unique($data);
        $expected = [
            0 => 'foo',
            2 => 'bar',
            3 => [
                'foo' => 'bar',
            ],
        ];
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @test
     */
    public function uniqueFlat()
    {
        $data = [
            'foo',
            'foo',
            'bar',
            [
                'foo',
                'foo',
            ],
        ];
        
        $actual = ArrayHelper::uniqueFlat($data);
        $expected = [
            0 => 'foo',
            2 => 'bar',
            3 => [
                'foo',
                'foo',
            ],
        ];
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @test
     */
    public function toArray()
    {
        $data = (object)[
            'foo' => false,
            'bar' => (object)[
                'foo' => 'bar',
                'bar' => true,
            ],
        ];
        
        $actual = ArrayHelper::toArray($data);
        $expected = [
            'foo' => false,
            'bar' => [
                'foo' => 'bar',
                'bar' => true,
            ],
        ];
        
        $this->assertEquals($expected, $actual);
    }
}
