<?php

namespace App\Repositories\Eloquent\Interfaces;


use Illuminate\Database\Eloquent\Model;

/**
* Interface BaseRepositoryInterface
* @package App\Repositories
*/
interface BaseRepositoryInterface
{
   /**
    * @param array $attributes
    * @return Model
    *
    * save Attribute
    */
   public function create(array $attributes);

   /**
    * @param array $attributes
    * @return Model
    *
    * save Attribute
    */
    public function update(array $attributes, $id);

   /**
    * @param $id
    * @return Model
    *
    * find model attribute
    */
   public function find($id);

    /**
    * @param $id
    * @return Model
    *
    * find model attribute using user_id
    */
    public function findByUserId($userid);
   
}