<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsDelete extends Component
{
    public $skill;

    protected $listeners = ['skilldelete'];

    public function skilldelete($id)
    {
        // fill $skill with the eloquent model of the same id
        $this->skill = Skill::find($id);
        // show delete modal
        $this->dispatch('deletemodeltoggle');
    }

    public function submit()
    {
        // delete record
        $this->skill->delete();
        $this->reset('skill');
        // hide modal
        $this->dispatch('deletemodeltoggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(SkillsData::class);
    }
    public function render()
    {
        return view('admin.skills.skills-delete');
    }
}
