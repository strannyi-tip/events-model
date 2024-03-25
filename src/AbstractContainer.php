<?php

namespace StrannyiTip\EventsModel;

use Countable;
use Iterator;

abstract class AbstractContainer implements Iterator, Countable
{

    /**
     * Container.
     *
     * @var array
     */
    protected array $container = [];

    /**
     * Iterator cursor position.
     *
     * @var int
     */
    protected int $position = 0;

    /**
     * @inheritDoc
     */
    abstract public function current(): mixed;

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @inheritDoc
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        return isset($this->container[$this->position]);
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->container);
    }
}