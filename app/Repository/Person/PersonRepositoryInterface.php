<?php

namespace App\Repository\Person;

interface PersonRepositoryInterface
{
    public function all();

    public function find($id);

    public function findByIds($ids);

    public function findByCodes($request);

    public function getPaginate($data);

    public function getListOrderBy($request);
}
