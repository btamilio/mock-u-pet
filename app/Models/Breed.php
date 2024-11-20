<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Breed extends Model
{
    protected $table = 'pet_breeds';

    public function scopeCats(Builder $query) : void
    {
        $query->where('type', '=', 'C');
    }

    public function scopeDogs(Builder $query) : void
    {
        $query->where('type', '=', 'D');
    }



}
