<?php

namespace App\Livewire;

use Livewire\Component;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class LoginForm extends Component
{


    public $email = "";
    public $password = "";

    protected $rules = [
        'password' => 'required',
        'email'    => 'required|email'
    ];
 

    public function login()
    {
 
        $credentials = $this->validate($this->rules);
        
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended('web.account.pets');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
