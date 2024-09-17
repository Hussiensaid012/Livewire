<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProjectsUpdate extends Component
{
    use WithFileUploads;
    public $project, $name, $description, $link, $image, $category_id, $categories;

    public function mount()
    {

        $this->categories = Category::all();
    }

    protected $listeners = ['projectUpdate'];

    public function projectUpdate($id)
    {
        $this->project = Project::find($id);
        $this->name = $this->project->name;
        $this->description = $this->project->description;
        $this->link = $this->project->link;
        $this->category_id = $this->project->category_id;
        $this->resetValidation();
        $this->dispatch('editModelToggle');
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required|string',
            'link' => 'nullable',
            'image' => 'nullable',
            'category_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [

            'category_id' => 'category',
        ];
    }

    public function submit()
    {
        $data = $this->validate($this->rules(), [], $this->attributes());
        //check if project has image ->delete the old image ->save the new
        if ($this->image) {
            unlink($this->project->image);
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $imageName, 'public');
            $data['image'] = 'storage/images/' . $imageName;
        } else {
            unset($data['image']);
        }
        // save data in database
        $this->project->update($data);
        // hide model
        $this->dispatch('editModelToggle');
        // refresh projects data component
        $this->dispatch('refreshData')->to(projectsData::class);
    }

    public function render()
    {
        return view('admin.projects.projects-update');
    }
}
