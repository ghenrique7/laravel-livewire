<?php

namespace App\Repositories\Plans;

use App\Models\Plans\Objective;
use App\Repositories\ObjectiveRepositoryInterface;

class ObjectiveRepository implements ObjectiveRepositoryInterface
{
    public function __construct(
        protected Objective $model
    )
    {
    }

    public function getAll() {
        return $this->model->latest()->paginate(25);
    }

    public function findOne(string $id) {
        return $this->model->find($id);
    }

    public function new(array $attributes) {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, string $id) {
        $objective = $this->findOne($id);

        $objective->update($attributes);

        return $objective;
    }

    public function delete(string $id) {
        $objective = $this->findOne($id);
        $objective->delete();
    }

    public function search(string $filter) {
        return $this->model
            ->where('name', 'ILIKE', "%{$filter}%")
            ->paginate();
    }
}
