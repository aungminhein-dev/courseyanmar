<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Comment;
use App\Models\DenyReason;

class UserController extends Controller
{
    public function home()
    {
        $user = User::with(['enrolledCourses' => function ($query) {
            $query->withCount('lessons');
        }])->find(Auth::user()->id);
        $enrolledCourses = $user->enrolledCourses;
        $courses = Course::with('category:name,id')->withCount('lessons')->take(6)->get();
        return view('user.home', compact('courses', 'enrolledCourses'));
    }
    public function denyReason($id)
    {
        $reason = DenyReason::with('enrollment.course')->where('enrollment_id', $id)->first();
        // dd($reason->toArray());
        return view('user.course.denied', compact('reason'));
    }

    // delete enrollment
    public function deleteEnrollment($id)
    {
        Enrollment::where('id',$id)->delete();
        DenyReason::where('enrollment_id',$id)->delete();
        toastr()->success('Your enrollment has been removed!','Action Completed!');
        return redirect()->route('user.enrolledCourses');
    }
    public function courses()
    {
        return view('user.course.index');
    }

    public function buyPage($courseId)
    {
        $course = Course::withCount('lessons')->find($courseId);
        $user = Auth::user();
        $enrolledData = $user->load('enrolledCourses');
        return view('user.course.enroll', compact('course', 'enrolledData'));
    }

    public function buy(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'image' => 'required',
            'email' => 'required',
        ]);
        $courseId = $request->courseId;
        if ($this->isUserAlreadyEnrolled($user, $courseId)) {
            toastr()->warning("You've already enrolled this course", 'Failed');
            return back();
        }
        $this->incrementCourseBuyerCount($courseId);
        $this->storePaymentScreenshot($request, $user, $courseId);
        toastr()->success('Your course has listed to admins.', 'Action Completed!');
        return back();
    }

    public function enrolledCourses(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $enrolledCourses = $user->enrolledCourses();

        $searchQuery = $request->input('search');
        $status = $request->status;
        if ($searchQuery) {
            $enrolledCourses->where('courses.name', 'like', '%' . $searchQuery . '%');
        }
        if ($status !== null && ($status === '0' || $status === '1')) {
            $enrolledCourses->where('enrollments.status', $status);
        }
        $filteredCourses = $enrolledCourses->with('category')->get();
        return view('user.course.enrolled-courses', compact('filteredCourses', 'searchQuery'));
    }

    public function playList($courseId)
    {
        $user = Auth::user();
        if ($this->isUserEnrolledAndActive($user, $courseId)) {
            $enrolledCourses = $user->enrolledCourses()->where('status', 1)->get();
            $lessons = Lesson::where('course_id', $courseId)->when(request('searchKey'), function ($query) {
                $query->where(request('key'), 'like', '%' . request('searchKey') . '%');
            })->get();
            $firstData = Lesson::where('course_id', $courseId)->first();
            $course = Course::find($courseId);
            return view('user.course.play-lessons', compact('course', 'firstData', 'lessons', 'enrolledCourses'));
        } else {
            toastr()->warning('Please enroll first to study this course!', 'Failed');

            return back();
        }
    }

    public function changePasswordPage()
    {
        return view('user.change-password');
    }

    public function courseDetails($id)
    {
        Course::where('id', $id)->increment('view_count', 1);
        $course = Course::where('id', $id)->with('category:name,id')
            ->withCount('lessons')
            ->first();
        $categories = Category::get();
        $popularCourses = Course::orderBy('view_count','desc')->where('id', '!=', $course->id)
            ->where('category_id', $course->category_id)->take(2)->get();
        $comments = Comment::where('course_id', $course->id)->with('user')->get();
        return view('user.course.details', compact('course', 'categories', 'popularCourses', 'comments'));
    }

    public function userProfile()
    {
        $userDetail = User::where('id', Auth::user()->id)->first();
        return view('user.profile', compact('userDetail'));
    }


    private function isUserAlreadyEnrolled($user, $courseId)
    {
        return $user->enrollments()->where('course_id', $courseId)->exists();
    }

    private function incrementCourseBuyerCount($courseId)
    {
        Course::where('id', $courseId)->increment('buyer_count', 1);
    }

    private function storePaymentScreenshot($request, $user, $courseId)
    {
        if ($request->hasFile('image')) {
            $image = uniqid() . $request->image->getClientOriginalName();
            $request->file('image')->storeAs('public/payment_screenshots/', $image);

            Enrollment::create([
                'user_id' => $user->id,
                'course_id' => $courseId,
                'status' => 0,
                'payment_screenshot' => $image,
            ]);
        }
    }

    private function isUserEnrolledAndActive($user, $courseId)
    {
        return $user->enrollments()->where('course_id', $courseId)->where('status', 1)->exists();
    }
}
