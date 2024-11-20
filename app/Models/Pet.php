<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\User;



class Pet extends Model
{
 
    public function owner() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }



}
