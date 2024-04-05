<?php

namespace StrannyiTip\EventsModel;

use StrannyiTip\EventsModel\Interfaces\EventDependencyInterface;

class LinkedEventDependency implements Interfaces\EventDependencyInterface
{
    /**
     * Linked event dependency.
     *
     * @param mixed $source Source data
     */
    public function __construct(private readonly string $key, private readonly mixed &$source){}

    /**
     * @inheritDoc
     */
    public function getSource(): mixed
    {
        return $this->source;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return $this->key;
    }
}