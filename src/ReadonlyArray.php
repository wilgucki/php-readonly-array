<?php

namespace Wilgucki;

final class ReadonlyArray implements \ArrayAccess
{
    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
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
}
