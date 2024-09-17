<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectsCreate extends Component
{
    use WithFileUploads;
    public $name, $description, $link, $image, $category_id, $categories;

    public function mount()
    {

        $this->categories = Category::all();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required|string',
            'link' => 'nullable',
            'image' => 'required',
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
        $data = $this->validate($this->rules(), $this->attributes());
        //save image on my project
        $imageName = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('images', $imageName, 'public');
        // save data in database
        $data['image'] = 'storage/images/' . $imageName;
        Project::create($data);
        // reset Data after save from form
        $this->reset(['name', 'description', 'link', 'image', 'category_id']);
        // hide model
        $this->dispatch('createModelToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(ProjectsData::class);
    }
    public function render()
    {
        return view('admin.projects.projects-create');
    }
}
