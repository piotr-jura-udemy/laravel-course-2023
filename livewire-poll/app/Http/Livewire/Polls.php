<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Polls extends Component
{
    public function render()
    {
        $polls = \App\Models\Poll::with('options.votes')->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }
}