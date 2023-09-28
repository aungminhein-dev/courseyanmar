<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function adminDashboard(Request $request)
    {
        // Count statistics
        $categoryCount = Category::count();
        $courseCount = Course::count();
        $lessonCount = Lesson::count();
        $enrollmentCount = Enrollment::where('status',1)->count();
        $userCount = User::where('role','user')->count();

        // Date variables
        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');
        $startOfMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfMonth = Carbon::now()->subMonth()->endOfMonth();

        // Last month statistics
        $lastMonthCourseCount = Course::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $lastMonthEnrollmentCount = Enrollment::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $lastMonthUserCount = User::where('role', 'user')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        // This month statistics
        $thisMonthCourseCount = Course::whereMonth('created_at', $thisMonth)->whereYear('created_at',$thisYear)->count();
        $thisMonthEnrollmentCount = Enrollment::where('status',1)->whereMonth('created_at', $thisMonth)->whereYear('created_at',$thisYear)->count();
        $thisMonthUserCount = User::where('role', 'user')->whereMonth('created_at', $thisMonth)->whereYear('created_at',$thisYear)->count();

        //  user counts for the current year
        $userCountsCurrentYear = $this->getUserCountsByYear($thisYear);
        $userCountCurrentYear = User::whereYear('created_at',$thisYear)->where('role','user')->count();
        //  user counts for the last year
        $userCountsLastYear = $this->getUserCountsByYear($thisYear-1);
        $userCountLastYear = User::whereYear('created_at',$thisYear-1)->where('role','user')->count();

        $thisYearEnrollment = Enrollment::where('status',1)->whereYear('created_at',$thisYear)->count();
        $lastYearEnrollment = Enrollment::where('status',1)->whereYear('created_at',$thisYear-1)->count();


        $monthsThisYear = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0,
            'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0,
            'Oct' => 0, 'Nov' => 0, 'Dec' => 0,
        ];
        $monthsLastYear = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0,
            'Apr' => 0, 'May' => 0, 'Jun' => 0,
            'Jul' => 0, 'Aug' => 0, 'Sep' => 0,
            'Oct' => 0, 'Nov' => 0, 'Dec' => 0,
        ];

        foreach ($userCountsCurrentYear as $u) {
            $monthsThisYear[$u->month] += $u->count;
        }

        foreach ($userCountsLastYear as $u) {
            $monthsLastYear[$u->month] += $u->count; //  counts for both years
        }
        $enrollments = Enrollment::with('course')->where('status',1)->get();
        $totalPrice = $enrollments->sum(function ($enrollment) {
            return $enrollment->course->price;
        });
        $xData = array_keys($monthsThisYear); // Month abbreviations use php functions*** to note for other projects
        $yDataThisYear = array_values($monthsThisYear); // User counts
        $yDataLastYear = array_values($monthsLastYear);
        if($request->ajax()){
            return response()->json([
                'xData' => $xData,
                'yDataThisYear' => $yDataThisYear,
                'yDataLastYear' => $yDataLastYear,
                'thisYearEnrollment' => $thisYearEnrollment,
                'lastYearEnrollment' => $lastYearEnrollment,
                'thisYear' => $thisYear,
                'lastYear' => $thisYear-1
            ]);
        }
        return view('admin.dashboard', compact(
            'categoryCount', 'courseCount', 'lessonCount', 'thisMonthCourseCount',
            'userCount', 'lastMonthCourseCount',
            'lastMonthEnrollmentCount', 'thisMonthEnrollmentCount', 'enrollmentCount','userCount',
            'userCountCurrentYear','userCountLastYear','thisMonthUserCount','lastMonthUserCount','thisYear','thisYearEnrollment',
            'lastYearEnrollment'
        ));
    }



    //  Settings.....
    // profile
    public function profile($id)
    {
        $userDetail = User::where('id', $id)->first();
        $userDetail->load('enrolledCourses');
        // dd($userDetail->toArray());
        return view('admin.account.profile',compact('userDetail'));
    }

    // add new admin page
    public function addNewUserPage()
    {
        return view('admin.user-management.add-user');
    }

    // add new admin
    public function addNewUser(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'required'
        ])->validate();
        $data = $this->requestUserData($request);
        if($request->hasFile('image')){
            $image = uniqid().$request->image->getClientOriginalName();
            $data['image'] = $image;
            $request->file('image')->storeAs('public',$image);
        }
        User::create($data);
        toastr()->success('A new admin has been created!','Action Completed!');
        return back();
    }
    // deleteUser
    public function deleteUser($id)
    {
        User::where('id',$id)->delete();
        toastr()->success('A user is deleted!','Action Complete');
        return back();
    }

    // upgrade profile
    public function upgrade(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ])->validate();
        $data = $this->requestUserData($request);
        if($request->hasFile('image')){
            $image = uniqid().$request->image->getClientOriginalName();
            $data['image'] = $image;
            $request->file('image')->storeAs('public',$image);
        }
        User::where('id',$request->userId)->update($data);
        toastr()->success('Your profile has been updated','Action Complete!');
        return back();
    }
    // change password page
    public function changePasswordPage()
    {
        return view('admin.account.change-password');
    }

    // change password
    public function changePassword(Request $request)
    {
        $admin = User::where('id',Auth::user()->id)->first();
        if(Hash::check($request->oldPassword, $admin->password) &&  ($request->newPassword == $request->confirmPassword)){
           User::where('id',Auth::user()->id)->update([
            'password' => Hash::make($request->newPassword)
           ]);
        }
        toastr()->success('Your password has changed','Action Completed!');
        return back();
    }

    // reset password page
    public function resetPasswordPage()
    {
        return view('admin.account.reset-password');
    }

    // themes
    public function themes()
    {
        return view('admin.account.themes');
    }

    // change theme
    public function changeTheme(Request $request)
    {
        User::where('id',Auth::user()->id)->update([
            'background'=> $request->background
        ]);
    }

    // lists ......
    // admin list
    public function adminList()
    {
        $admins = User::where('role','admin')
        ->when(request('searchKey'),function($query){
            $query->where('name','like','%'.request('searchKey').'%');
        })
        ->paginate(10);
        return view('admin.user-management.admin-list',compact('admins'));
    }
    // user list
    public function userList()
    {
        $users = User::where('role','user')
        ->when(request('searchKey'),function($query){
            $query->where('name','like','%'.request('searchKey').'%');
        })
        ->paginate(10);
        return view('admin.user-management.user-list',compact('users'));
    }

    private function requestUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'role' => $request->role
        ];
    }

    private function getUserCountsByYear($year)
    {
        return DB::table('users')
            ->select(DB::raw('DATE_FORMAT(created_at, "%b") as month'), DB::raw('COUNT(*) as count'))
            ->where('role','user')
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%m")'), 'asc')
            ->get();
    }
}
