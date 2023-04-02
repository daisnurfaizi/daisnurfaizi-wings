<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public  function  show($id)
    {
        return $this->model->findOrFail($id);
    }

    public  function  showBy($field, $value, $columns = array('*'))
    {
        return $this->model->where($field, $value)->first($columns);
    }

    public  function  getModels()
    {
        return $this->model;
    }

    public function  softDelete($id)
    {
        $record = $this->model::where('id', $id)->delete();
        return $record;
    }
}
