<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository implements BaseRepositoryInterface
{
    /**      
     * @var Model      
     */     
    protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes)
    {
        $model = $this->model->newInstance($attributes);

        $model->save();

        return $model;
    }
 
    /**
    * @param $id
    * @return Model
    */
    public function find($id)
    {
        return $this->model->find($id);
    }


     /**
    * @param $id
    * @return Model
    */
    public function findByUserId($userid)
    {
        return $this->model->where('user_id',$userid)->get();
    }

      /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }
}
