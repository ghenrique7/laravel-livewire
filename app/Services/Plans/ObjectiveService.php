<?php

namespace App\Services\Plans;


use App\Repositories\ObjectiveRepositoryInterface;

class ObjectiveService
{
    public function __construct(
        protected ObjectiveRepositoryInterface $repository
    ) {

    }

    public function getAll()
    {
        return $this->repository->getAll();
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

    public function search(string $filter) {
        return $this->repository->search($filter);
    }
}
