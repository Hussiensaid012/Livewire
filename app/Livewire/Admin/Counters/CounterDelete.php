<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;

class CounterDelete extends Component
{
    public $counter;

    protected $listeners = ['counterdelete'];

    public function counterdelete($id)
    {
        // fill $counter with the eloquent model of the same id
        $this->counter = Counter::find($id);
        // show delete modal
        $this->dispatch('deletemodeltoggle');
    }

    public function submit()
    {
        // delete record
        $this->counter->delete();
        $this->reset('counter');
        // hide modal
        $this->dispatch('deletemodeltoggle');
        // refresh counters data component
        $this->dispatch('refreshData')->to(CounterData::class);
    }
    public function render()
    {
        return view('admin.counters.counter-delete');
    }
}
