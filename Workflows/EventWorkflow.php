<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Interfaces\EventInterface;
use Zenaton\Traits\Zenatonable;

class EventWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new TaskA())->execute();

        (new TaskB())->execute();
    }

    public function onEvent(EventInterface $event)
    {
        if ($event instanceof MyEvent) {
            (new TaskC())->execute();
        }
    }

    public function getId()
    {
        return 'MyId';
    }
}
