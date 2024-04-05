<?php

namespace StrannyiTip\EventsModel;

use Closure;

/**
 * Event dispatcher;
 */
class EventDispatcher
{
    /**
     * Event dispatcher.
     */
    public function __construct(private EventSubscriberContainer $subscribers){}

    /**
     * Subscribe action to event.
     *
     * @param string $event_class Event class name
     * @param Closure $action Action closure
     *
     * @return EventDispatcher
     */
    public function subscribe(string $event_class, Closure $action): EventDispatcher
    {
        if (!isset($this->subscribers[$event_class])) {
            $this->subscribers[$event_class] = new EventActionContainer();
        }
        $this->subscribers[$event_class]->add($action);

        return $this;
    }

    /**
     * Trigger event.
     *
     * @param string $event_name Event::class
     * @param EventDependenciesWrapper|null $dependencies Event dependencies
     *
     * @return void
     */
    public function trigger(string $event_name, EventDependenciesWrapper|null $dependencies = null): void
    {
        foreach ($this->subscribers[$event_name] as $action) {
            $action($dependencies);
        }
    }
}