<?php

namespace StrannyiTip\EventsModel;

use StrannyiTip\EventsModel\Interfaces\EventDependencyInterface;

/**
 * Event dependencies wrapper.
 */
class EventDependenciesWrapper
{
    /**
     * Dependencies.
     *
     * @var array
     */
    private array $container = [];

    /**
     * Add dependency.
     *
     * @param EventDependency $dependency Dependency
     *
     * @return EventDependenciesWrapper
     */
    public function add(EventDependencyInterface $dependency): EventDependenciesWrapper
    {
        $this->container[$dependency->getKey()] = $dependency->getSource();

        return $this;
    }

    /**
     * Get dependency.
     *
     * @param string $key Dependency key
     *
     * @return mixed Source
     */
    public function get(string $key): mixed
    {
        return $this->container[$key] ?? null;
    }
}