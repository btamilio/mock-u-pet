<?php


namespace App\Models\Pets;

use App\Models\Pet;
use App\Models\Breed;

use App\Models\Scopes\BreedTypeScope; 
class Dog extends Breed
{
  protected $type = 'D';

 

}
