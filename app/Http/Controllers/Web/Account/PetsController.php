<?php

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Breed;

class PetsController extends Controller
{

    
 
    public function index()
    {
        return view("account.pets", [
            "pets" => Pet::all() ?? [],
            "breeds" => Breed::all() ?? []
 
        ]);
    }

 
    public function create()
    {
        //
    }

 
    public function store()
    {
        //
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

 
    public function update($id)
    {
        //
    }
 
    public function destroy($id)
    {
        //
    }

}



 