<?php

namespace StrannyiTip\EventsModel\Interfaces;

/**
 * Event dependency.
 */
interface EventDependencyInterface
{
    /**
     * Get source data.
     *
     * @return mixed
     */
    public function getSource(): mixed;

    /**
     * Get key.
     *
     * @return string
     */
    public function getKey(): string;
}