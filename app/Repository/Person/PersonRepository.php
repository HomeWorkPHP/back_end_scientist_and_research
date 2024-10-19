<?php

namespace App\Repository\Person;

use App\Models\Person;

class PersonRepository
{
    private $personModel;

    public function __construct(Person $personModel)
    {
        return $this->personModel = $personModel;
    }

    public function all()
    {
        return $this->personModel->all();
    }

    public function find($id)
    {
        return $this->personModel->where('id', $id)->first();
    }

    public function findByIds($ids)
    {
        return $this->personModel->withTrashed()->whereIn('id', $ids)->get();
    }

    public function findByCodes($request)
    {
        $data = $this->personModel->whereIn('code', $request['codes']);
        if (!empty($request['name']))
        {
            $data = $data->whereRaw('LOWER(name) like ?', ['%' . strtolower($request['name']) . '%']);
        }
        return $data->orderBy($request['field'], $request['sortOrder'])->withCount('students')->paginate($request['pageSize']);

    }

    public function getListOrderBy($request)
    {
        $data = $this->personModel;
        if (!empty($request['last_name']))
        {
            $data = $data->whereRaw('LOWER(last_name) like ?', ['%' . strtolower($request['last_name']) . '%']);
        }
        return $data->orderBy($request['field'], $request['sortOrder'])->paginate($request['pageSize']);
    }
}
