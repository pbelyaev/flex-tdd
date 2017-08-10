<?php

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class UsersControllerIndexSuccessResponse
{
    /**
     * @var array
     */
    protected $users;

    /**
     * @param array $users
     */
    public function __construct(array $users)
    {
        $this->users = $users;
    }

    /**
     * @return JsonResponse
     */
    public function toResponse(): JsonResponse
    {
        return new JsonResponse([
            'type' => 'success',
            'data' => [
                'users' => $this->users,
            ],
        ]);
    }
}