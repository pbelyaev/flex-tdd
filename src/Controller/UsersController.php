<?php

namespace App\Controller;

use App\Contract\Response;
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
     * @return Response
     */
    public function index(): Response
    {
        return new UsersControllerIndexSuccessResponse(
            $this->usersRepository->getAll()
        );
    }

    /**
     * @param int $id
     * @return Response
     */
    public function show(int $id = 0): Response
    {
        $user = $this->usersRepository->findById($id);

        if (empty($user)) {
            return new UsersControllerShowFailResponse;
        }

        return new UsersControllerShowSuccessResponse($user);
    }
}
