<?php

use Wilgucki\ReadonlyArray;

class ReadonlyArrayTest extends PHPUnit_Framework_TestCase
{
    public function testOffsetExists()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        $this->assertTrue(isset($readonlyArray['a']));
    }

    public function testNullValue()
    {
        $readonlyArray = new ReadonlyArray(['a' => null]);
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

    public function testCount()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1, 'b' => 2]);
        $this->assertCount(2, $readonlyArray);
    }

    public function testCurrent()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1, 'b' => 2]);
        $this->assertEquals(1, $readonlyArray->current());
    }

    public function testNext()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1, 'b' => 2]);
        $this->assertEquals(2, $readonlyArray->next());
    }

    public function testKey()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1, 'b' => 2]);
        $this->assertEquals('a', $readonlyArray->key());
    }

    public function testValid()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1, 'b' => 2]);
        $this->assertTrue($readonlyArray->valid());
    }

    public function testValidEmptyArray()
    {
        $readonlyArray = new ReadonlyArray([]);
        $this->assertFalse($readonlyArray->valid());
    }

    public function testValidOutOfRange()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1]);
        $readonlyArray->next();
        $this->assertFalse($readonlyArray->valid());
    }

    public function testRewind()
    {
        $readonlyArray = new ReadonlyArray(['a' => 1, 'b' => 2]);
        $readonlyArray->next();
        $readonlyArray->rewind();
        $this->assertEquals(1, $readonlyArray->current());
    }
}
