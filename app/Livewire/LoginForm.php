<?php

namespace App\Livewire;

use Livewire\Component;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Validator;


class LoginForm extends Component
{



 
    public $email = '';

 
    public $password = '';


    public function login()
    {
        $validated = $this->validate(['email' => 'bail|required|email', 'password' => 'bail|required|min:8']);
        
        if (Auth::attempt($validated))
            return redirect()->intended('web.account.pets');
        
        
        $this->addError('creds', 'The provided credentials do not match our records');   

    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
