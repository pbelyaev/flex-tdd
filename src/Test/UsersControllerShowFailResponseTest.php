<?php

namespace App\Test;

use App\Response\UsersControllerShowFailResponse;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersControllerShowFailResponseTest extends KernelTestCase
{

    /**
     * @var UsersControllerShowFailResponse
     */
    private $response;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->response = new UsersControllerShowFailResponse;
    }

    /**
     * @return void
     */
    public function testHasThrowExceptionMethod(): void
    {
        $this->assertTrue(
            method_exists($this->response, 'throwException')
        );
    }

    /**
     * @return void
     */
    public function testThrowExceptionReturnsNotFoundHttpException(): void
    {
        $this->assertInstanceOf(
            NotFoundHttpException::class,
            $this->response->throwException()
        );
    }
}
