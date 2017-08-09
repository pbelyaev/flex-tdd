<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'status' => 'success',
            'data' => $this->usersRepository->getAll(),
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws NotFoundHttpException
     */
    public function show(int $id = 0): JsonResponse
    {
        $user = $this->usersRepository->findById($id);

        if (empty($user)) {
            throw new NotFoundHttpException;
        }

        return new JsonResponse([
            'status' => 'success',
            'data' => $user,
        ]);
    }
}
