<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsUpdate extends Component
{
    public $skill, $name, $progress;

    protected $listeners = ['SkillUpdate'];

    public function SkillUpdate($id)
    {
        $this->skill = Skill::find($id);
        $this->name = $this->skill->name;
        $this->progress = $this->skill->progress;
        $this->resetValidation();
        $this->dispatch('editModelToggle');
    }

    public function rules()
    {
        return [
            'progress' => 'required|numeric',
            'name' => 'required|string'
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in database
        $this->skill->update($data);
        // hide model
        $this->dispatch('editModelToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(SkillsData::class);
    }

    public function render()
    {
        return view('admin.skills.skills-update');
    }
}
