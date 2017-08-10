<?php

namespace App\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersControllerShowFailResponse
{
    /**
     * @return void
     * @throws NotFoundHttpException
     */
    public function toResponse()
    {
        throw new NotFoundHttpException;
    }
}