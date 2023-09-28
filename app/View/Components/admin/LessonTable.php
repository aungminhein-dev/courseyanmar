<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LessonTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $lessons;
    public $course;
    public function __construct($lessons,$course)
    {
        $this->lessons = $lessons;
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.lesson-table');
    }
}
