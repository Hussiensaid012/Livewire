<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesCreate extends Component
{
    public $name;
    public $description;
    public $icon;

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required|string',
            'icon' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in database
        Service::create($data);
        // reset Data after save from form
        $this->reset(['name', 'description', 'icon']);
        // hide model
        $this->dispatch('createModelToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(ServicesData::class);
    }
    public function render()
    {
        return view('admin.services.services-create');
    }
}
