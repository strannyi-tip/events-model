<?php

namespace StrannyiTip\Test\Unit;

use Codeception\Test\Unit;
use JetBrains\PhpStorm\NoReturn;
use StrannyiTip\EventsModel\EventDependenciesWrapper;
use StrannyiTip\EventsModel\EventDependency;
use StrannyiTip\EventsModel\EventDispatcher;
use StrannyiTip\EventsModel\EventSubscriberContainer;
use StrannyiTip\Test\Event\TestEvent;

class EventDispatcherTest extends Unit
{
    protected EventDispatcher $dispatcher;

    protected function _before(): void
    {
        parent::_before();
        $this->dispatcher = new EventDispatcher(new EventSubscriberContainer());
    }

    #[NoReturn] public function testTrigger()
    {
        $_SESSION['test_event_number'] = 0;
        $this->dispatcher->subscribe(TestEvent::class, function () {
            $_SESSION['test_event_number'] += 10;
        });
        $this->dispatcher->trigger(TestEvent::class);
        $this->assertEquals(10, $_SESSION['test_event_number']);
    }

    public function testDependency()
    {
        $number_0 = 0;
        $number_1 = 1;
        $number_2 = 2;
        $wrapper = new EventDependenciesWrapper();
        $wrapper
            ->add(new EventDependency('get_0', $number_0))
            ->add(new EventDependency('get_1', $number_1))
            ->add(new EventDependency('get_2', $number_2));
        $this->dispatcher->subscribe(TestEvent::class, function (EventDependenciesWrapper $dependencies) {
            $this->assertEquals(0, $dependencies->get('get_0'));
            $this->assertEquals(1, $dependencies->get('get_1'));
            $this->assertEquals(2, $dependencies->get('get_2'));
        });
        $this->dispatcher->trigger(TestEvent::class, $wrapper);
    }
}
