<?php

namespace App\Builder;

class PodcastsBuilder
{
    /**
     * @var array
     */
    private $items = [
        ['id' => 1, 'category_id' => 1, 'slug' => 'some-podcast-1', 'name' => 'Some podcast #1'],
        ['id' => 2, 'category_id' => 5, 'slug' => 'some-podcast-2', 'name' => 'Some podcast #2'],
        ['id' => 3, 'category_id' => 1, 'slug' => 'some-podcast-3', 'name' => 'Some podcast #3'],
        ['id' => 4, 'category_id' => 3, 'slug' => 'some-podcast-4', 'name' => 'Some podcast #4'],
        ['id' => 5, 'category_id' => 5, 'slug' => 'some-podcast-5', 'name' => 'Some podcast #5'],
    ];

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function getFirst(): array
    {
        return reset($this->items);
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return count($this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 !== $this->getCount();
    }

    /**
     * @param int $categoryId
     * @return static
     */
    public function hasCategory(int $categoryId): self
    {
        $this->items = array_filter($this->items, function ($item) use ($categoryId) {
            return $item['category_id'] === $categoryId;
        });

        return $this;
    }
}
