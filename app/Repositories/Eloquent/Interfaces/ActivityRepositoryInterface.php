<?php
namespace App\Repositories\Eloquent\Interfaces;

interface UserRepositoryInterface
{
    //fetch all user activities
   public function all($id);
   
}