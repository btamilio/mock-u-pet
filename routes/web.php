<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\Account\PetsController;


// I like route files to be sparse, always referencing controllers for consistency.




Route::get('/', HomeController::class)->name('web.home');


Route::get('/account/pets', [PetsController::class, "index"])->name('web.account.pets');



