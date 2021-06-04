<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Poke extends Component
{

    public $search = "ditto";
    public $pokes = null;

    public function getpokes()
    {
        $res =   Http::get("https://pokeapi.co/api/v2/pokemon/ditto");
        $body = $res->json();
        $this->pokes = $body;

    }

    public function render()
    {

        return view('livewire.poke');
    }
}
