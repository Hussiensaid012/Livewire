<?php

namespace App\Livewire\Admin\Settings;

use App\Models\setting;
use Livewire\Component;

class UpdateSettings extends Component
{
    public  $settings;

    public function mount()
    {
        $this->settings = setting::find(1);
    }

    public function rules()
    {
        return [

            'settings.name' => 'required|string',
            'settings.email' => 'required|email',
            'settings.phone' => 'required',
            'settings.address' => 'required',
            'settings.facebook' => 'nullable|url',
            'settings.twitter' => 'nullable|url',
            'settings.linkedin' => 'nullable|url',
            'settings.instagram' => 'nullable|url',
        ];
    }


    public function submit()
    {
        $this->validate();
        $this->settings->save();
        session()->flash('message', 'settings updated successfully');
    }

    public function render()
    {
        return view('admin.settings.update-settings');
    }
}
