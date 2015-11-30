<?php

use Wilgucki\ReadonlyArray;

class ReadonlyArrayTest extends PHPUnit_Framework_TestCase
{
    public function testOffsetExists()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        $this->assertTrue(isset($readonlyArray['a']));
    }

    public function testOffsetDoesNotExists()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        $this->assertFalse(isset($readonlyArray['b']));
    }

    public function testOffetGet()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        $this->assertEquals(1, $readonlyArray['a']);
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function testInvalidOffetGet()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        $readonlyArray['b'];
    }

    /**
     * @expectedException LogicException
     */
    public function testOffsetSet()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        $readonlyArray['a'] = 2;
    }

    /**
     * @expectedException LogicException
     */
    public function testOffsetUnset()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        unset($readonlyArray['a']);
    }
}
