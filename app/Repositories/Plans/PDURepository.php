<?php

namespace App\Repositories\Plans;

use App\Models\Plans\Plan;
use App\Repositories\PDURepositoryInterface;

class PDURepository implements PDURepositoryInterface
{
    protected $model;
    protected $typePlanId;

    public function __construct(Plan $plan, TypePlanRepository $typePlanRepository)
    {
        $typePlan = $typePlanRepository->getTypeByName('PDU');

        $this->typePlanId = $typePlan->id;

        $this->model = $plan->whereHas('type_plan', function ($query) use ($typePlan) {
            $query->where('id', $typePlan->id);
        });
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
        $attributes['type_plan_id'] = $this->typePlanId;
        return $this->model->create($attributes);
    }

    public function update(array $attributes, string $id)
    {
        if (!$plan = $this->model->find($id)) {
            return null;
        }


        $attributes['type_plan_id'] = $this->typePlanId;

        $plan->update($attributes);

        return $plan;
    }


    public function delete(string $id)
    {
        return $this->model->find($id)->delete();
    }

}
