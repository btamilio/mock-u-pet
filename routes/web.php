<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LoginController;


// I like route files to be sparse, always referencing controllers for consistency.




Route::get('/', HomeController::class)->name('home');


Route::get('/account/pets', HomeController::class)->name('web.account.pets');



