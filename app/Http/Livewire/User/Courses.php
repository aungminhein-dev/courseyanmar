<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Courses extends Component
{
    public $categoryId;
    public $categories;
    public $enrolledCourses;

    public function sortData($id)
    {
        $this->categoryId = $id;
    }

    public function render()
    {
        $this->categories = Category::withCount('courses')->get();
        $coursesQuery = Course::withCount('lessons');

        $user = User::with('enrolledCourses')->find(Auth::user()->id);

        if ($this->categoryId) {
            $coursesQuery->where('category_id', $this->categoryId);
        }

        $courses = $coursesQuery->with('category')->paginate(10);
        $this->enrolledCourses = $user->enrolledCourses;
        return view('livewire.user.courses',compact('courses')); // Use $this->enrolledCourses
    }
}
