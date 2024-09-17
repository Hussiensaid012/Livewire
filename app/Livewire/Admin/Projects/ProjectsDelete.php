<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectsDelete extends Component
{
    public $project;

    protected $listeners = ['projectdelete'];

    public function projectdelete($id)
    {
        // fill $project with the eloquent model of the same id
        $this->project = Project::find($id);
        // show delete modal
        $this->dispatch('deletemodeltoggle');
    }

    public function submit()
    {
        //delete record
        unlink($this->project->image);
        // delete record
        $this->project->delete();
        $this->reset('project');
        // hide modal
        $this->dispatch('deletemodeltoggle');
        // refresh projects data component
        $this->dispatch('refreshData')->to(projectsData::class);
    }
    public function render()
    {
        return view('admin.projects.projects-delete');
    }
}
