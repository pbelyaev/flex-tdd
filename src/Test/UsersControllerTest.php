<?php

namespace App\Test;

use PHPUnit\Framework\TestCase;
use App\Controller\UsersController;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersControllerTest extends TestCase
{
    /**
     * @var UsersController
     */
    private $controller;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->controller = new UsersController;
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
            $this->controller->show()
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
            $this->controller->show()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testShowReturnsFailStatusCode()
    {
        $this->assertEquals(
            404,
            $this->controller->show()->getStatusCode()
        );
    }
}
