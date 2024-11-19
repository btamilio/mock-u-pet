<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class HomeController extends Controller
{


    public function __invoke(Request $request)
    {

        if ($request->user()) {
            return redirect()->route('web.account.pets', [], 303);
        }

        return view("home");
    }

 
}
