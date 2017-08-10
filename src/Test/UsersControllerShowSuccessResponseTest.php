<?php

namespace App\Test;

use App\Response\UsersControllerShowSuccessResponse;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersControllerShowSuccessResponseTest extends KernelTestCase
{
    /**
     * @var array
     */
    private $user = [
        'id' => 1,
        'username' => 'John Doe',
    ];

    /**
     * @var UsersControllerShowSuccessResponse
     */
    private $response;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->response = new UsersControllerShowSuccessResponse($this->user);
    }

    /**
     * @return void
     */
    public function testHasToResponseMethod(): void
    {
        $this->assertTrue(
            method_exists($this->response, 'toResponse')
        );
    }

    /**
     * @return void
     */
    public function testToResponseReturnsJsonResponse(): void
    {
        $this->assertInstanceOf(
            JsonResponse::class,
            $this->response->toResponse()
        );
    }

    /**
     * @return void
     */
    public function testResponseReturnsSuccessStatusCode(): void
    {
        $this->assertEquals(
            200,
            $this->response->toResponse()->getStatusCode()
        );
    }

    /**
     * @return void
     */
    public function testResponseReturnsJson(): void
    {
        $this->assertJson(
            $this->response->toResponse()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testResponseHasRightStructure(): void
    {
        $responseDecoded = json_decode($this->response->toResponse()->getContent(), true);

        $this->assertArrayHasKey('type', $responseDecoded);
        $this->assertArrayHasKey('data', $responseDecoded);
        $this->assertArrayHasKey('user', $responseDecoded['data']);
    }

    /**
     * @return void
     */
    public function testResponseHasUsers(): void
    {
        $responseDecoded = json_decode($this->response->toResponse()->getContent(), true);

        $this->assertEquals($this->user, $responseDecoded['data']['user']);
    }
}
