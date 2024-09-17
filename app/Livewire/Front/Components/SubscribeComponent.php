<?php

namespace App\Livewire\Front\Components;

use App\Models\Subscribar;
use Livewire\Component;

class SubscribeComponent extends Component
{
    public $email;
    public function rules()
    {
        return [
            'email' => 'required|email|unique:subscribars,email',
        ];
    }

    public function submit()
    {
        $this->validate();
        Subscribar::create(['email' => $this->email]);
        $this->reset('email');
        session()->flash('message', 'Subscribes Successfully');
    }

    public function render()
    {
        return view('front.components.subscribe-component');
    }
}
