<?php

namespace App\EventListener;

use App\Contract\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class ResponseEventListener
{
    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $controllerResult = $event->getControllerResult();

        /* First check that the controller result implements Response interface */
        if ($controllerResult instanceof Response) {
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
