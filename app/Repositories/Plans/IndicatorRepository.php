<?php

namespace App\Repositories\Plans;

use App\Models\Plans\Indicator;
use App\Repositories\IndicatorRepositoryInterface;

class IndicatorRepository implements IndicatorRepositoryInterface
{
    public function __construct(
        protected Indicator $model
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

        if (!$indicator = $this->model->find($id)) {
            return null;
        }

        $indicator->update($attributes);

        return $indicator;
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
