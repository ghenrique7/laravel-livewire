<?php

namespace App\Repositories;

interface TypePlanRepositoryInterface
{
    public function getTypeByName(string $type);
}
