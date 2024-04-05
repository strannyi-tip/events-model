<?php

namespace StrannyiTip\EventsModel;

use Closure;

/**
 * Event subscriber container.
 */
class EventSubscriberContainer extends AbstractNamedContainer
{
    /**
     * @inheritDoc
     */
    public function offsetGet(mixed $offset): EventActionContainer|null
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->container[$offset] = $value;
    }
}
