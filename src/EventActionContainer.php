<?php

namespace StrannyiTip\EventsModel;

use Closure;

/**
 * Event actions.
 */
class EventActionContainer extends AbstractContainer
{
    /**
     * Add action.
     *
     * @param Closure|null $action Action
     *
     * @return EventActionContainer
     */
    public function add(Closure|null $action): EventActionContainer
    {
        $this->container[] = $action;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function current(): Closure|null
    {
        return $this->container[$this->position] ?? null;
    }
}
