<?php

namespace App\Contract;

interface Repository
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id);
}
