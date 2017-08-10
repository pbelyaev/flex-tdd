<?php

namespace App\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersControllerShowFailResponse
{
    /**
     * @return NotFoundHttpException
     */
    public function throwException(): NotFoundHttpException
    {
        return new NotFoundHttpException;
    }
}