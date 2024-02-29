<?php

namespace App\Services\Plans;

use App\Repositories\PDIRepositoryInterface;

class PDIService
{
    public function __construct(
        protected PDIRepositoryInterface $repository
    ) {

    }

    public function getAll(string $filter = null)
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id)
    {
        return $this->repository->findOne($id);
    }

    public function new(array $attributes)
    {
        return $this->repository->new($attributes);
    }

    public function update(array $attributes, string $id)
    {
        return $this->repository->update($attributes, $id);
    }

    public function delete(string $id) {
        return $this->repository->delete($id);
    }


}
