<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{

    public $num = 0;
    public $name = "MEHDI";

    public function inc($name)
    {
        $this->num++;
        $this->name = $name;
    }

    public function dec($name)
    {
        $this->num--;
        $this->name = $name;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
