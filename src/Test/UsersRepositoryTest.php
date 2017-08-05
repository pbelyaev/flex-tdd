<?php

namespace App\Test;

use App\Repository\UsersRepository;
use PHPUnit\Framework\TestCase;

class UsersRepositoryTest extends TestCase
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
        $this->assertTrue(
            is_array(
                $this->usersRepository->findById(1)
            )
        );
    }
}