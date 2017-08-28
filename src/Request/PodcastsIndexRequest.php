<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class PodcastsIndexRequest
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return bool
     */
    public function hasCategoryId(): bool
    {
        return $this->request->query->has('category-id');
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->request->query->getInt('category-id');
    }
}
