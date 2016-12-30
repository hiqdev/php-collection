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

use hiqdev\php\collection\ArrayHelper;

/**
 * ArrayHelper test suite.
 */
class ArrayHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection
     */
    protected $sample;

    protected function setUp()
    {
    }

    protected function tearDown()
    {
        $this->sample = null;
    }

    public function testXML()
    {
        $xml = simplexml_load_file(__DIR__ . '/test.xml');
        $a = ArrayHelper::toArray($xml);
        $this->assertEquals($a, [
            '@attributes' => [
                'backupGlobals' => 'false',
                'backupStaticAttributes' => 'false',
                'colors' => 'true',
                'convertErrorsToExceptions' => 'true',
                'convertNoticesToExceptions' => 'true',
                'convertWarningsToExceptions' => 'true',
                'processIsolation' => 'false',
                'stopOnFailure' => 'false',
                'syntaxCheck' => 'false',
                'bootstrap' => './tests/bootstrap.php',
            ],
            'testsuites' => [
                'testsuite' => [
                    '@attributes' => [
                        'name' => 'PhpCollection Unit Test Suite',
                    ],
                    'directory' => './tests/',
                ],
            ],
        ]);
    }
}
