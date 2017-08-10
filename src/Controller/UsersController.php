<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Response\UsersControllerShowFailResponse;
use App\Response\UsersControllerShowSuccessResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * @return mixed
     */
    public function show(int $id = 0)
    {
        $user = $this->usersRepository->findById($id);

        if (empty($user)) {
            return new UsersControllerShowFailResponse;
        }

        return new UsersControllerShowSuccessResponse($user);
    }
}
