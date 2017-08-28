<?php

namespace App\Response;

use App\Contract\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class PodcastsIndexSuccessResponse implements Response
{
    /**
     * @var array
     */
    private $podcasts;

    /**
     * @param array $podcasts
     */
    public function __construct(array $podcasts)
    {
        $this->podcasts = $podcasts;
    }

    /**
     * @return JsonResponse
     */
    public function toResponse()
    {
        return new JsonResponse([
            'status' => 'success',
            'data' => [
                'podcasts' => $this->podcasts,
            ],
        ]);
    }
}
