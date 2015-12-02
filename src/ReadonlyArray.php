<?php

namespace Wilgucki;

final class ReadonlyArray implements \ArrayAccess, \Countable, \Iterator
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetGet($offset)
    {
        if (!isset($this->data[$offset])) {
            throw new \OutOfRangeException('Invalid offset');
        }
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new \LogicException("This operation is forbidden");
    }

    public function offsetUnset($offset)
    {
        throw new \LogicException("This operation is forbidden");
    }

    public function count()
    {
        return count($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        return next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return key($this->data) !== null;
    }

    public function rewind()
    {
        return reset($this->data);
    }
}
