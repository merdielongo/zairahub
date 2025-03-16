<?php

namespace App\Repositories;

use App\Models\OrganizationType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrganizationTypeRepository
{
    /**
     * The OrganizationType model.
     *
     * @var OrganizationType
     */
    protected OrganizationType $organizationType;

    /**
     * OrganizationTypeRepository constructor.
     *
     * @param OrganizationType|null $organizationType
     */
    public function __construct(OrganizationType $organizationType = null)
    {
        $this->organizationType = $organizationType ?? new OrganizationType();
    }

    /**
     * Retrieve a specified organizationType from database by id.
     *
     * @param $id
     * @return OrganizationType
     */
    public function getById($id)
    {
        return $this->organizationType->findOrFail($id);
    }

    /**
     * Retrieve all organizationType from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->organizationType->all();
    }

    /**
     * Get a list of organizationType by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->organizationType->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->organizationType->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a organizationType from database by a field according to a given value.
     *
     * @return OrganizationType
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->organizationType->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of organizationType from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->organizationType->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of organizationType from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->organizationType->where($constraints)->get();
    }

    /**
     * Store a new organizationType in the database.
     *
     * @param array $inputs
     * @return OrganizationType
     */
    public function store(array $inputs)
    {
        return $this->organizationType->create($inputs);
    }

    /**
     * Update a organizationType
     *
     * @return OrganizationType
     */
    public function update(array $inputs, $id)
    {
        $instance = $this->getById($id);
        foreach($inputs as $property => $value)
            $instance->$property = $value;
        $instance->save();
        return $this->getById($id);
    }

    /**
     * Remove a organizationType from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    /**
    * Remove a organizationType from database
    *
    * @return void
    */
    public function forceDelete($id)
    {
        $this->getById($id)->forceDelete();
    }

    //
}
