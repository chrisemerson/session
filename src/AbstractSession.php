<?php declare(strict_types = 1);

namespace CEmerson\Session;

abstract class AbstractSession implements Session
{
    public function __get(string $key)
    {
        return $this->get($key);
    }

    public function __set(string $key, $value)
    {
        return $this->set($key, $value);
    }

    public function __isset(string $key): bool
    {
        return $this->isset($key);
    }

    public function __unset(string $key)
    {
        return $this->unset($key);
    }

    public function offsetExists($offset)
    {
        return $this->isset((string) $offset);
    }

    public function offsetGet($offset)
    {
        return $this->get((string) $offset);
    }

    public function offsetSet($offset, $value)
    {
        return $this->set((string) $offset, $value);
    }

    public function offsetUnset($offset)
    {
        return $this->unset((string) $offset);
    }
}
