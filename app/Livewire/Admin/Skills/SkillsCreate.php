<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsCreate extends Component
{
    public $name;
    public $progress;

    public function rules()
    {
        return [
            'name' => 'required',
            'progress' => 'required|numeric',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in database
        Skill::create($data);
        // reset Data after save from form
        $this->reset(['name', 'progress']);
        // hide model
        $this->dispatch('createModelToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(SkillsData::class);
    }

    public function render()
    {
        return view('admin.skills.skills-create');
    }
}
