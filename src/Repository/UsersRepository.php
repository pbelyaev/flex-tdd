<?php

namespace App\Repository;

use App\Contract\Repository;

class UsersRepository implements Repository
{
    /**
     * @var array
     */
    private $items = [
        [ 'id' => 1, 'username' => 'sa' ],
        [ 'id' => 2, 'username' => 'sb' ],
        [ 'id' => 3, 'username' => 'sc' ],
        [ 'id' => 4, 'username' => 'sd' ],
        [ 'id' => 5, 'username' => 'se' ],
    ];

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->items;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        $found = array_filter($this->items, function ($user) use ($id) {
            return $user['id'] === $id;
        });

        return array_pop($found) || false;
    }
}
