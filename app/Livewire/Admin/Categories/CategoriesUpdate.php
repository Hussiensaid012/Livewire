<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesUpdate extends Component
{
    public $category, $name;

    protected $listeners = ['categoryUpdate'];

    public function categoryUpdate($id)
    {
        $this->category = Category::find($id);
        $this->name = $this->category->name;
        $this->resetValidation();
        $this->dispatch('editModelToggle');
    }

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
        $this->category->update($data);
        // hide model
        $this->dispatch('editModelToggle');
        // refresh categorys data component
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }

    public function render()
    {
        return view('admin.categories.categories-update');
    }
}
