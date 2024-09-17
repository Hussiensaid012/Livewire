<?php

namespace App\Livewire\Admin\Subscribers;

use App\Livewire\Admin\Skills\SkillsData;
use App\Models\Subscribar;
use Livewire\Component;

class SubscribersDelete extends Component
{
    public $subscriber;

    protected $listeners = ['subscriberdelete'];

    public function subscriberdelete($id)
    {
        // fill $subscriber with the eloquent model of the same id
        $this->subscriber = Subscribar::find($id);
        // show delete modal
        $this->dispatch('deletemodeltoggle');
    }

    public function submit()
    {
        // delete record
        $this->subscriber->delete();
        $this->reset('subscriber');
        // hide modal
        $this->dispatch('deletemodeltoggle');
        // refresh subscribers data component
        $this->dispatch('refreshData')->to(SubscribersData::class);
    }
    public function render()
    {

        return view('admin.subscribers.subscribers-delete');
    }
}
