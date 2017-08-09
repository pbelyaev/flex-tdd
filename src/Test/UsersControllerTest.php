<?php

namespace App\Test;

use App\Controller\UsersController;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function setUp()
    {
        self::bootKernel();

        $this->container = self::$kernel->getContainer();
        $this->controller = $this->container->get(UsersController::class);
    }

    /**
     * @return void
     */
    public function testHasIndexMethod()
    {
        $this->assertTrue(
            method_exists($this->controller, 'index')
        );
    }

    /**
     * @return void
     */
    public function testIndexReturnsJsonResponse()
    {
        $this->assertInstanceOf(
            JsonResponse::class,
            $this->controller->index()
        );
    }

    /**
     * @return void
     */
    public function testIndexReturnsSuccessStatusCode()
    {
        $this->assertEquals(
            200,
            $this->controller->index()->getStatusCode()
        );
    }

    /**
     * @return void
     */
    public function testIndexReturnsJson()
    {
        $this->assertJson(
            $this->controller->index()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testHasShowMethod()
    {
        $this->assertTrue(
            method_exists($this->controller, 'show')
        );
    }

    /**
     * @return void
     */
    public function testShowReturnsJsonResponse()
    {
        $this->assertInstanceOf(
            JsonResponse::class,
            $this->controller->show(1)
        );
    }

    /**
     * @return void
     */
    public function testShowReturnsSuccessStatusCode()
    {
        $this->assertEquals(
            200,
            $this->controller->show(1)->getStatusCode()
        );
    }

    /**
     * @return void
     */
    public function testShowReturnsJson()
    {
        $this->assertJson(
            $this->controller->show(1)->getContent()
        );
    }

    /**
     * @return void
     */
    public function testShowReturnsFailStatusCode()
    {
        $this->expectException(NotFoundHttpException::class);

        $this->controller->show();
    }
}
