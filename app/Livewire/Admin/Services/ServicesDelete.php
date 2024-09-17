<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesDelete extends Component
{
    public $service;

    protected $listeners = ['servicedelete'];

    public function servicedelete($id)
    {
        // fill $service with the eloquent model of the same id
        $this->service = Service::find($id);
        // show delete modal
        $this->dispatch('deletemodeltoggle');
    }

    public function submit()
    {
        // delete record
        $this->service->delete();
        $this->reset('service');
        // hide modal
        $this->dispatch('deletemodeltoggle');
        // refresh services data component
        $this->dispatch('refreshData')->to(ServicesData::class);
    }
    public function render()
    {
        return view('admin.services.services-delete');
    }
}
