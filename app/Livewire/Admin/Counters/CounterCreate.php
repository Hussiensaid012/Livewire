<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;

class CounterCreate extends Component
{
    public $name;
    public $count;
    public $icon;

    public function rules()
    {
        return [
            'name' => 'required',
            'count' => 'required|numeric',
            'icon' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in database
        Counter::create($data);
        // reset Data after save from form
        $this->reset(['name', 'count', 'icon']);
        // hide model
        $this->dispatch('createModelToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(CounterData::class);
    }
    public function render()
    {
        return view('admin.counters.counter-create');
    }
}
