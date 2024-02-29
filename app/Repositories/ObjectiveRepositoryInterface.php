<?php

namespace App\Repositories;

interface ObjectiveRepositoryInterface
{
    public function getAll();

    public function findOne(string $id);

    public function new(array $attributes);

    public function update(array $attributes, string $id);

    public function delete(string $id);

    public function search(string $filter);
}
