<?php

namespace App\View\Auth\Livewire;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{

    public $state;

    public function save()
    {
        $user = (new CreateNewUser())->create($this->state);
        \Auth::login($user);
        $this->redirect("/");
    }

    public function render()
    {
        return view('auth.components.register');
    }
}
