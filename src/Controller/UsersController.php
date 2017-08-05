<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->usersRepository = new UsersRepository;
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
        return new JsonResponse([
            'status' => 'success',
            'data' => $this->usersRepository->findById($id),
        ]);
    }
}