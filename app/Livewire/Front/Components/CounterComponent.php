<?php

namespace App\Livewire\Front\Components;

use App\Models\Counter;
use Livewire\Component;

class CounterComponent extends Component
{
    public function render()
    {
        return view('front.components.counter-component', [
            'counters' => Counter::take(4)->get(),
        ]);
    }
}
