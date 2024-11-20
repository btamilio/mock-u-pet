<?php

namespace App\Livewire\Account\Pets;

use Livewire\Component;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Validator;


class RegisterForm extends Component
{

    public function create()
    {
        $validated = $this->validate([
                // 'email' => 'bail|required|email', 
                // 'password' => 'bail|required|min:8'
        ]);

    }

    public function render()
    {
        return view('livewire.account.pets.register-form');
    }
}
