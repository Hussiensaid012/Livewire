<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesCreate extends Component
{
    public $name;

    public function rules()
    {
        return [
            'name' => 'required',

        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save data in database
        Category::create($data);
        // reset Data after save from form
        $this->reset(['name']);
        // hide model
        $this->dispatch('createModelToggle');
        // refresh skills data component
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-create');
    }
}
