<?php

namespace App\Test;

use App\Controller\UsersController;
use App\Response\UsersControllerIndexSuccessResponse;
use App\Response\UsersControllerShowFailResponse;
use App\Response\UsersControllerShowSuccessResponse;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UsersControllerTest extends KernelTestCase
{
    /**
     * @var UsersController
     */
    private $controller;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @return void
     */
    public function setUp(): void
    {
        self::bootKernel();

        $this->container = self::$kernel->getContainer();
        $this->controller = $this->container->get(UsersController::class);
    }

    /**
     * @return void
     */
    public function testHasIndexMethod(): void
    {
        $this->assertTrue(
            method_exists($this->controller, 'index')
        );
    }

    /**
     * @return void
     */
    public function testIndexReturnsSuccessResponse(): void
    {
        $this->assertInstanceOf(
            UsersControllerIndexSuccessResponse::class,
            $this->controller->index()
        );
    }

    /**
     * @return void
     */
    public function testHasShowMethod(): void
    {
        $this->assertTrue(
            method_exists($this->controller, 'show')
        );
    }

    /**
     * @return void
     */
    public function testShowReturnsSuccessResponse(): void
    {
        $this->assertInstanceOf(
            UsersControllerShowSuccessResponse::class,
            $this->controller->show(1)
        );
    }

    /**
     * @return void
     */
    public function testShowReturnsFailResponse(): void
    {
        $this->assertInstanceOf(
            UsersControllerShowFailResponse::class,
            $this->controller->show(0)
        );
    }
}
