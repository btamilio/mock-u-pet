<?php

namespace App\Models;

use App\Enums\Pet\Type as PetType;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Pet extends Model
{



    public function owner() : HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }


    protected function casts() : array
    {
        return [
            'type' => PetType::class,
        ];
    }


}