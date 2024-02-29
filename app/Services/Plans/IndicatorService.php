<?php

namespace App\Services\Plans;


use App\Repositories\IndicatorRepositoryInterface;

class IndicatorService
{
    public function __construct(
        protected IndicatorRepositoryInterface $model
    ) {

    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function findOne(string $id)
    {
        return $this->model->findOne($id);
    }

    public function new(array $attributes)
    {
        return $this->model->new($attributes);
    }

    public function update(array $attributes, string $id)
    {
        return $this->model->update($attributes, $id);
    }

    public function delete(string $id) {
        return $this->model->delete($id);
    }

    public function search(string $filter) {
        return $this->model->search($filter);
    }
}
