<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Response\UsersControllerIndexSuccessResponse;
use App\Response\UsersControllerShowFailResponse;
use App\Response\UsersControllerShowSuccessResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
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
     * @return UsersControllerIndexSuccessResponse
     */
    public function index(): UsersControllerIndexSuccessResponse
    {
        return new UsersControllerIndexSuccessResponse(
            $this->usersRepository->getAll()
        );
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
