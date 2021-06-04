<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{


public $amount = 20;

protected $listeners = ['loadmore'];

    public function loadmore()
    {
        $this->amount += 3;
    }

    public function render()
    {
        $users = User::limit($this->amount)->get();
        return view('livewire.users', compact('users'));
    }
}
