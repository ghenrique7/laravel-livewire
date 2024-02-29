<?php

namespace App\Repositories\Plans;

use App\Models\Plans\TypePlan;
use App\Repositories\TypePlanRepositoryInterface;

class TypePlanRepository implements TypePlanRepositoryInterface
{
    protected $model;

    public function __construct(TypePlan $model)
    {
        $this->model = $model;
    }

    public function getTypeByName($type)
    {
        return $this->model->where('name', $type)->first();
    }
}
