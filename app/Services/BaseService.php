<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

abstract class BaseService
{
    /**
     * @var BaseRepository;
     */
    protected $mainRepository;

    public function create(array $attributes)
    {
        return $this->mainRepository->create($attributes);
    }

    public function update(array $data)
    {
        return $this->mainRepository->update($data);
    }

    /**
     * @param $columns
     * @param $orderBy
     * @param $sortBy
     * @return mixed
     */
    public function all(
        $columns = SELECT_ALL,
        $orderBy = ID,
        $sortBy = ORDER_ASC
    ) {
        return $this->mainRepository->all($columns, $orderBy, $sortBy);
    }

    public function find($id)
    {
        return $this->mainRepository->find($id);
    }

    public function findOneOrFail($id)
    {
        return $this->mainRepository->findOneOrFail($id);
    }

    public function findBy(array $data, $columns = SELECT_ALL)
    {
        return $this->mainRepository->findBy($data, $columns);
    }

    public function findOneBy(array $data)
    {
        return $this->mainRepository->findOneBy($data);
    }

    public function findOneByOrFail(array $data)
    {
        return $this->mainRepository->findOneByOrFail($data);
    }

    public function deleteAll()
    {
        return $this->mainRepository->deleteAll();
    }

    public function findByAttrFirst($attr, $value)
    {
        return $this->mainRepository->findByAttrFirst($attr, $value);
    }


    public function pluckAttrId($attr = null)
    {
        return $this->mainRepository->pluckAttrId($attr);
    }

    public function deleteByAttr($attr, $value)
    {
        return $this->mainRepository->deleteByAttr($attr, $value);
    }

    public function findByAttrInArray($attr, $array = [])
    {
        return $this->mainRepository->findByAttrInArray($attr, $array);
    }

    public function updateOrCreateModel($data = null)
    {
        return $this->mainRepository->updateOrCreateModel($data);
    }

    public function arrayAttrId($attr = null)
    {
        return $this->mainRepository->arrayAttrId($attr);
    }

    public function getAllWithRelationship(
        $relations = [''],
        $columns = SELECT_ALL,
        $orderBy = ID,
        $sortBy = ORDER_ASC
    ) {
        return $this->mainRepository->getAllWithRelationship($relations, $columns, $orderBy, $sortBy);
    }

    public function findByWithRelationship(
        array $relations,
        array $data,
        $columns = SELECT_ALL,
        $orderBy = ID,
        $sortBy = ORDER_DESC
    ) {
        return $this->mainRepository->findByWithRelationship($relations, $data, $columns, $orderBy, $sortBy);
    }

    public function whereIn($column, array $data, $relations = [])
    {
        return $this->mainRepository->whereIn($column, $data, $relations);
    }

    /**
     * @return users.id if user login else return false
     */
    public function getLoginUserId()
    {
        if (Auth::check()) {
            return Auth::user()->getAuthIdentifier();
        }
        return false;
    }
}
