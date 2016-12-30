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

/**
 * Collection Trait test suite.
 */
trait CollectionTestTrait
{
    /**
     * @var array items
     */
    protected $items = [
        'first'   => 'first',
        'null'    => null,
        'zero'    => [],
        'empty'   => [],
        'string'  => [],
        'single'  => [],
        'hash'    => [],
        'main'    => [],
        'sidebar' => [
            'items' => [
                'header' => [
                    'label'   => 'MAIN NAVIGATION',
                    'options' => ['class' => 'header'],
                ],
            ],
        ],
        'existing' => [],
        'last'     => [],
    ];

    protected $newkey   = 'newkey';
    protected $existing = 'existing';
    protected $value    = 'the new value';

    public function testHas()
    {
        foreach ($this->items as $k => $v) {
            $this->assertTrue($this->sample->hasItem($k));
        }
    }

    public function testHasNot()
    {
        $this->assertFalse($this->sample->hasItem('unexistent'));
        $this->assertFalse($this->sample->hasItem(''));
    }

    public function testEmptyName()
    {
        $empty = '';
        $this->assertFalse(isset($this->sample->{$empty}));
        $this->sample->{$empty} = $this->value;
        $this->assertTrue(isset($this->sample->{$empty}));
        $this->assertEquals($this->value, $this->sample->{$empty});
    }

    public function testKeys()
    {
        $this->assertEquals($this->sample->keys(), array_keys($this->items));
    }

    public function testSetNew()
    {
        $this->sample->setItem($this->newkey, $this->value);
        $this->assertTrue($this->sample->hasItem($this->newkey));
        $this->assertEquals($this->value, $this->sample->getItem($this->newkey));
    }

    public function testSetExisting()
    {
        $this->sample->setItem($this->existing, $this->value);
        $this->assertEquals(array_keys($this->items), $this->sample->keys());
        $this->assertEquals($this->value, $this->sample->getItem($this->existing));
    }

    public function testSetFirst()
    {
        $this->sample->setItem($this->existing, $this->value, 'first');
        $keys = array_keys($this->items);
        $keys = array_combine($keys, $keys);
        unset($keys[$this->existing]);
        $keys = array_merge([$this->existing], array_values($keys));
        $this->assertEquals($keys, $this->sample->keys());
        $this->assertEquals($this->value, $this->sample->getItem($this->existing));
    }

    public function testSetLast()
    {
        $this->sample->setItem($this->existing, $this->value, 'last');
        $keys = array_keys($this->items);
        $keys = array_combine($keys, $keys);
        unset($keys[$this->existing]);
        $keys = array_merge(array_values($keys), [$this->existing]);
        $this->assertEquals($keys, $this->sample->keys());
        $this->assertEquals($this->value, $this->sample->getItem($this->existing));
    }

    public function testDelete()
    {
        $this->sample->delete('zero');
        $this->assertFalse($this->sample->hasItem('zero'));
    }

    public function testDeleteAll()
    {
        foreach ($this->items as $k => $v) {
            $this->sample->delete($k);
        }
        foreach ($this->items as $k => $v) {
            $this->assertFalse($this->sample->hasItem($k));
        }
        $this->assertEquals([], $this->sample->keys());
    }

    public function testAddExisting()
    {
        foreach ([null, 'first', 'last', ['before' => 'last']] as $where) {
            $this->sample->add($this->existing, $this->value, $where);
            $this->assertEquals(array_keys($this->items), $this->sample->keys());
        }
    }

    public function testAddDefault()
    {
        $this->sample->add('new', 'value');
        $this->assertEquals(array_merge(array_keys($this->items), ['new']), $this->sample->keys());
    }

    public function testAddFirst()
    {
        $this->sample->add('new', 'value', 'first');
        $this->assertEquals(array_merge(['new'], array_keys($this->items)), $this->sample->keys());
    }

    public function testAddLast()
    {
        $this->sample->add('new', 'value', 'last');
        $this->assertEquals(array_merge(array_keys($this->items), ['new']), $this->sample->keys());
    }

    public function testIteratorAggregate()
    {
        foreach ($this->sample as $k => $v) {
            $keys[] = $k;
        }
        $this->assertEquals(array_keys($this->items), $keys);
    }

    public function testReset()
    {
        $array = ['a' => 1, 'b' => 2];
        $this->sample->resetItems($array);
        $this->assertEquals($this->sample->getItems(), $array);
    }

    public function testUnsetAll()
    {
        $this->sample->unsetItems();
        $this->assertEquals($this->sample->getItems(), []);
    }

    public function testUnset()
    {
        $this->sample->unsetItems($this->existing);
        $this->assertFalse($this->sample->hasItem($this->existing));
        $this->sample->unsetItems(['first', 'last']);
        $this->assertFalse($this->sample->hasItem('first'));
        $this->assertFalse($this->sample->hasItem('last'));
    }
}
