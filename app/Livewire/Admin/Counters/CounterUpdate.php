<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;

class CounterUpdate extends Component
{
    public $counter, $name, $count, $icon;

    protected $listeners = ['counterUpdate'];

    public function counterUpdate($id)
    {
        $this->counter = Counter::find($id);
        $this->name = $this->counter->name;
        $this->count = $this->counter->count;
        $this->icon = $this->counter->icon;
        $this->resetValidation();
        $this->dispatch('editModelToggle');
    }

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
        $this->counter->update($data);
        // hide model
        $this->dispatch('editModelToggle');
        // refresh counters data component
        $this->dispatch('refreshData')->to(CounterData::class);
    }

    public function render()
    {
        return view('admin.counters.counter-update');
    }
}
