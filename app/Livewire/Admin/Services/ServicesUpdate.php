<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesUpdate extends Component
{
    public $service, $name, $description, $icon;

    protected $listeners = ['serviceUpdate'];

    public function serviceUpdate($id)
    {
        $this->service = Service::find($id);
        $this->name = $this->service->name;
        $this->description = $this->service->description;
        $this->icon = $this->service->icon;
        $this->resetValidation();
        $this->dispatch('editModelToggle');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in database
        $this->service->update($data);
        // hide model
        $this->dispatch('editModelToggle');
        // refresh services data component
        $this->dispatch('refreshData')->to(ServicesData::class);
    }

    public function render()
    {
        return view('admin.services.services-update');
    }
}
