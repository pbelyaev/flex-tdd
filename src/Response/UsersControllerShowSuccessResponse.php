<?php

namespace App\Response;

use App\Contract\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersControllerShowSuccessResponse implements Response
{
    /**
     * @var array
     */
    protected $user;

    /**
     * @param array $user
     */
    public function __construct(array $user = [])
    {
        $this->user = $user;
    }

    /**
     * @return JsonResponse
     */
    public function toResponse(): JsonResponse
    {
        return new JsonResponse([
            'type' => 'success',
            'data' => [
                'user' => $this->user,
            ],
        ]);
    }
}
