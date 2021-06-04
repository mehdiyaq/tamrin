<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

class Create extends Component
{

    public $name;
    public $desc;

    protected $rules = [
        'name' => 'required',
        'desc' => 'required'
    ];

    public function create()
    {
        $this->validate();

        auth()->user()->posts()->create([
            'name' => $this->name,
            'desc' => $this->desc
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
