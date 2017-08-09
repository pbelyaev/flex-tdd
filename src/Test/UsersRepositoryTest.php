<?php

namespace App\Test;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UsersRepositoryTest extends KernelTestCase
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->usersRepository = new UsersRepository;
    }

    /**
     * @return void
     */
    public function testReturnsArray()
    {
        $this->assertTrue(
            is_array(
                $this->usersRepository->getAll()
            )
        );
    }

    public function testReturnsRowById()
    {
        $userId = 1;
        $user = $this->usersRepository->findById($userId);

        $this->assertTrue(is_array($user));
        $this->assertArrayHasKey('id', $user);
        $this->assertEquals($userId, $user['id']);
    }
}