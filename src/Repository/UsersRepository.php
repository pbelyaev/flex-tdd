<?php

namespace App\Repository;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersRepository
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
     * @return array|bool
     * @throws NotFoundHttpException
     */
    public function findById(int $id)
    {
        $matches = array_filter($this->items, function ($user) use ($id) {
            return $user['id'] === $id;
        });

        if (0 === count($matches)) {
            throw new NotFoundHttpException;
        }

        return $matches[0];
    }
}
