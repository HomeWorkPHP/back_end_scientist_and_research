<?php

namespace App\Services;

use App\Repository\Person\PersonRepository;

class PersonService
{
    private $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAll()
    {
        return $this->personRepository->all();
    }

    public function getListOrderBy($request)
    {
        return $this->personRepository->getListOrderBy($request);
    }

}
