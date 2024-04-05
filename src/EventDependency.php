<?php

namespace StrannyiTip\EventsModel;

use StrannyiTip\EventsModel\Interfaces\EventDependencyInterface;

/**
 * Event dependency data.
 */
class EventDependency implements EventDependencyInterface
{
    /**
     * Event dependency.
     *
     * @param mixed $source Source data
     */
    public function __construct(private readonly string $key, private readonly mixed $source){}

    /**
     * Get source data.
     *
     * @return mixed
     */
    public function getSource(): mixed
    {
        return $this->source;
    }

    /**
     * Get key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
}