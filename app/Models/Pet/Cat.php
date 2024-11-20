<?php

namespace App\Models;


use App\Models\Pet;

class Cat extends Pet
{
    protected static $record_type = 'C';

    public function tracking()
    {
        return $this->hasMany(Breed::class, 'type', $this->record_type);
    }

}
