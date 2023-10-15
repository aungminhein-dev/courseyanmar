<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class CategorySearch extends Component
{
    public $search;
    public $categories;

    public function render()
    {
        if(strlen($this->search > 1)){
        $this->categories = Category::where('name','like','%'.$this->search.'%')->orderBy('created_at')->get();
        }
        return view('livewire.admin.category-search');
    }
}
