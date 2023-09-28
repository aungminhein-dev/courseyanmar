<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
class CourseSearchBar extends Component
{
    public $search = '';
    public function render()
    {
        $courses = [];
        if(strlen($this->search) > 1){
            $courses = Course::where('name','like','%'.$this->search.'%')->limit(5)->get();
        }
        return view('livewire.course-search-bar',compact('courses'));
    }
}
