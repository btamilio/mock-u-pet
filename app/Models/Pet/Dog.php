<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\Breed;

class Dog extends Pet
{
  protected $breed_type = 'D';
}
