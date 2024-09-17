<?php

namespace App\Livewire\Admin\Subscribers;

use App\Models\Subscribar;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribersData extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {

        $this->resetPage();
    }

    protected $listeners = ['refreshData' => '$refresh'];

    public function render()
    {
        return view(
            'admin.subscribers.subscribers-data',
            ['data' => Subscribar::where('email', 'like', '%' .
                $this->search . '%')->paginate(10)]
        );
    }
}
