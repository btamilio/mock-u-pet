<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;

use App\Models\Breed;

class Pet extends Model
{


    public function breeds() : HasMany
    {
        return (!empty($this->breed_type)) 
                    ? $this->hasMany(Breed::class, 'type', $this->breed_type)
                    : $this->hasMany(Breed::class);
    }


    public function owner() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

}
