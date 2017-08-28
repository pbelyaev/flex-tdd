<?php

namespace App\Controller;

use App\Contract\Response;
use App\Builder\PodcastsBuilder;
use App\Request\PodcastsIndexRequest;
use App\Response\PodcastsIndexSuccessResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PodcastsController extends Controller
{
    /**
     * @var PodcastsBuilder
     */
    private $podcastsBuilder;

    /**
     * @param PodcastsBuilder $podcastsBuilder
     */
    public function __construct(PodcastsBuilder $podcastsBuilder)
    {
        $this->podcastsBuilder = $podcastsBuilder;
    }

    /**
     * @param PodcastsIndexRequest $request
     * @return Response
     */
    public function index(PodcastsIndexRequest $request): Response
    {
        // Add query condition if there is a category id
        if ($request->hasCategoryId()) {
            $this->podcastsBuilder->hasCategory(
                $request->getCategoryId()
            );
        }

        return new PodcastsIndexSuccessResponse(
            $this->podcastsBuilder->getAll()
        );
    }
}
