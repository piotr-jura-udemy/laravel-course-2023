<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.create-poll');
    }
}