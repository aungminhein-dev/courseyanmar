<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CourseCarousel extends Component
{
    /**
     * Create a new component instance.
     */
    public $courses;
    public $enrolledCourses;

    public function __construct($courses,$enrolledCourses)
    {
        $this->courses = $courses;
        $this->enrolledCourses = $enrolledCourses;
    }

    public function render(): View|Closure|string
    {
        return view('components.course-carousel');
    }
}
