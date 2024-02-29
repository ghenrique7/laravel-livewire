<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAll(string $filter = null)
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('name', 'ILIKE', "%$filter%");
                }
            })
            ->paginate();
    }

    public function findOne(string $id)
    {
        return $this->model->find($id);
    }

    public function new(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, string $id)
    {
        if (!$plan = $this->model->find($id)) {
            return null;
        }

        $plan->update($attributes);

        return $plan;
    }


    public function delete(string $id)
    {
        return $this->model->find($id)->delete();
    }
}
