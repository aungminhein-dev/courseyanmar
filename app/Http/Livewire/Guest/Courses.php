<?php

namespace App\Http\Livewire\Guest;

use App\Models\Course;
use Livewire\Component;
use App\Models\Category;

class Courses extends Component
{
    public $categories;
    public $categoryId;
    public $search;

    public function sortByCategory($id)
    {
        $this->categoryId = $id;
    }

    public function render()
    {
        $this->categories = Category::withCount('courses')
            ->orderBy('created_at', 'desc')
            ->get();

        $initialCourses = Course::with('category')
            ->withCount('lessons')
            ->orderBy('created_at', 'desc');

        if ($this->categoryId) {
            $initialCourses->where('category_id', $this->categoryId);
        }

        if (strlen($this->search) > 1) {
            $initialCourses->where('name', 'like', '%' . $this->search . '%');
        }

        $courses = $initialCourses->paginate(12);

        return view('livewire.guest.courses', compact('courses'));
    }
}
