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
        $controllerResult = $event->getControllerResult();

        /* First check that controller result is an object */
        /* Unfortunately, it does not have any interfaces to implement, so it cannot check if it is custom response */
        /* TODO: create an interface and add validation */
        if (is_object($controllerResult)) {
            /* If there is toResponse method then use given response */
            if (method_exists($controllerResult, 'toResponse')) {
                $event->setResponse(
                    $controllerResult->toResponse()
                );
            }

            /* If there is throwException method then throw given exception */
            if (method_exists($controllerResult, 'throwException')) {
                throw $controllerResult->throwException();
            }
        }
    }
}