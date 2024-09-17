<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesDelete extends Component
{
    public $category;

    protected $listeners = ['categorydelete'];

    public function categorydelete($id)
    {
        // fill $category with the eloquent model of the same id
        $this->category = Category::find($id);
        // show delete modal
        $this->dispatch('deletemodeltoggle');
    }

    public function submit()
    {
        // delete record
        $this->category->delete();
        $this->reset('category');
        // hide modal
        $this->dispatch('deletemodeltoggle');
        // refresh categorys data component
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-delete');
    }
}
