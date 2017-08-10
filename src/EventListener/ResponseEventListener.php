<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class ResponseEventListener
{
    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $event->setResponse(
            $event->getControllerResult()->toResponse()
        );
    }
}