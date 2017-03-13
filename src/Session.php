<?php declare(strict_types = 1);

namespace CEmerson\Session;

use ArrayAccess;

interface Session extends ArrayAccess
{
    public function start();

    public function get(string $key);

    public function set(string $key, $value);

    public function isset(string $key): bool;

    public function unset(string $key);

    public function regenerate();

    public function __get(string $key);

    public function __set(string $key, $value);

    public function __isset(string $key): bool;

    public function __unset(string $key);
}
