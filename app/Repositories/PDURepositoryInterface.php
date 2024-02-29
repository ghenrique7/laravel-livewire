<?php

namespace App\Repositories;

interface PDURepositoryInterface
{
    public function getAll();

    public function findOne(string $id);

    public function new(array $attributes);

    public function update(array $attributes, string $id);

    public function delete(string $id);

}
