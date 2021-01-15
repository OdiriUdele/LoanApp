<?php
namespace App\Repositories\Eloquent\Interfaces;

interface UserRepositoryInterface
{

    /**
    * @param array $attributes
    * @return Model
    *
    * update User Detail
    */
    public function updateDetail(array $attributes, $id);
}