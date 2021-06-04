<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{

    public $name = "MMMM";

    public $selections = [];


    public function hydrate()
    {
        $this->name = 'hydrated';
    }

    public function add()
    {
        Post::create([
            'selection' => implode(', ', $this->selections)
        ]);

        $this->dispatchBrowserEvent('show', ['msg' => 'this is message']);
        return back();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
