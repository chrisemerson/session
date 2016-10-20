<?php declare(strict_types = 1);

namespace CEmerson\Session;

final class DefaultPHPSession extends AbstractSession implements Session
{
    public function get(string $key)
    {
        return $_SESSION[$key];
    }

    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function isset(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function unset(string $key)
    {
        unset($_SESSION[$key]);
    }
}
