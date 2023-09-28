<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VideoGalleryComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $lessons;
    public $firstData;
    public $course;
    public $enrolledCourses;
    public function __construct($lessons,$firstData,$course,$enrolledCourses)
    {
        $this->enrolledCourses = $enrolledCourses;
        $this->lessons = $lessons;
        $this->firstData = $firstData;
        $this->course = $course;

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.video-gallery-component');
    }
}
