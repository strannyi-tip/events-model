<?php

namespace StrannyiTip\EventsModel;

use ArrayAccess;

/**
 * Abstract named container.
 */
abstract class AbstractNamedContainer implements ArrayAccess
{
    /**
     * Container.
     *
     * @var array
     */
    protected array $container = [];

    /**
     * @inheritDoc
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * @inheritDoc
     */
    abstract public function offsetGet(mixed $offset): mixed;

    /**
     * @inheritDoc
     */
    abstract public function offsetSet(mixed $offset, mixed $value): void;

    /**
     * @inheritDoc
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }
}