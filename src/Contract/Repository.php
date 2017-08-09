<?php

namespace App\Contract;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

interface Repository
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function findById(int $id);
}