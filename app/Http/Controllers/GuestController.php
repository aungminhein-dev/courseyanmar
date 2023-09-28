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
        $popularCourses = Course::orderBy('buyer_count')->with('category')->limit(3)->get();
        return view('guest.guest-index',compact('studentCount','courseCount','lessonCount','categoryCount','popularCourses'));
    }

    public function courseDetails($id)
    {
        $categories = Category::withCount('courses')->get();
        $course = Course::with('category')->withCount('lessons')->first();
        $popularCourses = Course::orderBy('buyer_count')->where('id','!=',$id)->limit(2)->get();
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
        $courses = Course::with('category')->withCount('lessons')->get();
        return view('guest.courses','courses');
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
