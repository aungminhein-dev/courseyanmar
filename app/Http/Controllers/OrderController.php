<?php

namespace App\Http\Controllers;

use App\Models\DenyReason;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
     // orders
    public function orders()
    {
        $enrollments = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
        ->join('courses', 'enrollments.course_id', '=', 'courses.id')
        ->select(
            'enrollments.*',
            'users.id as user_id',
            'users.name as user_name',
            'users.image as user_image',
            'courses.id as course_id',
            'courses.name as course_name',
            'courses.image as course_image',
            'courses.price as course_price'
        )->get();
        return view('admin.order.index',compact('enrollments'));
    }

    // order detail
    public function orderDetail($orderId)
    {
        Enrollment::where('id',$orderId)->update([
            'order_status'=> 'old'
        ]);
        $enrollment = Enrollment::where('enrollments.id',$orderId)
        ->with('denyReason')
        ->leftJoin('deny_reasons','enrollments.id','deny_reasons.enrollment_id')
        ->join('users','enrollments.user_id','users.id')
        ->join('courses','enrollments.course_id','courses.id')
        ->select('enrollments.*','deny_reasons.description as deny_description','users.id as user_id','courses.id as course_id','users.name as user_name', 'courses.name as course_name','users.image as user_image','courses.image as course_image','courses.price as course_price')->first();
        return view('admin.order.detail',compact('enrollment'));
    }



    // order accept
    public function orderAccept(Request $request)
    {
        Enrollment::where('id',$request->enrollmentId)->update([
            'status' => 1
        ]);
        toastr()->success('An order has been accepted','Action Completed!');
        return back();
    }

    // order deny
    public function orderDeny(Request $request)
    {
        Enrollment::where('id',$request->enrollmentId)->update([
            'status' => 2
        ]);
        DenyReason::create([
            'description' => $request->description,
            'enrollment_id'=> $request->enrollmentId,
            'admin_name' => Auth::user()->name
        ]);
        toastr()->success('An order has been denied','Action Completed!');
        return back();
    }
}
