<?php

namespace App\Response;

use App\Contract\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersControllerShowFailResponse implements Response
{
    /**
     * @return NotFoundHttpException
     */
    public function throwException(): NotFoundHttpException
    {
        return new NotFoundHttpException;
    }
}
