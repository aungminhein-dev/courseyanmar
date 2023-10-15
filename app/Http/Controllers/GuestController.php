<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Comment;

class GuestController extends Controller
{
    public function index()
    {
        $studentCount = User::count();
        $courseCount = Course::count();
        $lessonCount = Lesson::count();
        $categoryCount = Category::count();
        $popularCourses = Course::orderBy('view_count','desc')->with('category')->withCount('lessons')->limit(3)->get();
        $categories = Category::withCount('courses')->select('id','name')->orderBy('created_at')->get();
        return view('guest.guest-index',compact('studentCount','courseCount','lessonCount','categoryCount','popularCourses','categories'));
    }

    public function courseDetails($id)
    {
        $categories = Category::withCount('courses')->get();
        $course = Course::with('category')->withCount('lessons')->where('id',$id)->first();
        $popularCourses = Course::orderBy('view_count')->where('id','!=',$id)->limit(2)->get();
        $comments = Comment::where('course_id',$course->id)->with('user')->get();
        return view('guest.course-details',compact('course','categories','popularCourses','comments'));
    }

    public function categoryDetails($id)
    {
        $category = Category::withCount('courses')->find($id);
        return view('guest.category-details',compact('category'));
    }

    public function about()
    {
        return view('guest.about');
    }

    // courses
    public function courses()
    {

        $categories = Category::withCount('courses')->select('id','name')->orderBy('created_at','desc')->get();
        $courses = Course::with('category')->withCount('lessons')->orderBy('created_at','desc')->get();
        return view('guest.courses',compact('courses','categories'));
    }


    // log in
    public function loginPage()
    {
        return view('authentication.login');
    }

    // register
    public function registerPage()
    {
        return view('authentication.register');
    }
}
