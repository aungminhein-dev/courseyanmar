<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(Request $request)
    {
      $coursesQuery = Course::with('category')
        ->withCount('lessons')
        ->when(request('searchKey'), function ($query, $searchKey) {
            $query->where('name', 'like', '%' . $searchKey . '%');
        });
        if ($request->status == 'latest') {
            $coursesQuery->orderBy('created_at', 'desc');
        } elseif($request->status == 'trending') {
            $coursesQuery->orderBy('buyer_count','desc');
        } else{
            $coursesQuery->orderBy('created_at', 'asc');
        }
        $courses = $coursesQuery->paginate(5);

        return view('admin.course.index',compact('courses'));
    }

    // create course
    public function createCoursePage()
    {
        $categories = Category::orderBy('created_at')->get();
        return view('admin.course.create-course',compact('categories'));
    }

    // create course
    public function createCourse(Request $request)
    {
        $this->inputValidation($request,'create');
        $data = $this->requestData($request);
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $data['image'] = $imageName;

        }
        Course::create($data);
        toastr()->success('A new course has been created','Action completed!');
        return redirect()->route('admin.courses');
    }

    // edit
    public function editCourse($id)
    {
        $course = Course::where('id',$id)->with('category')->first();
        $categories = Category::get();
        return view('admin.course.edit-course',compact('course','categories'));
    }

    // update
    public function updateCourse(Request $request)
    {
        $this->inputValidation($request,'update');
        $data = $this->requestData($request);
        if($request->hasFile('image')){
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        }
        Course::where('id',$request->id)->update($data);
        toastr()->success('An existing course has been updated','Action completed!');
        return redirect()->route('admin.courses');
    }

    // delete
    public function deleteCourse($id)
    {
        Course::where('id',$id)->delete();
        toastr()->success('A course has been deleted!','Action Completed!');
        return back();
    }

    private function requestData($request)
    {
        return [
            'name'=>$request->name,
            'description'=>$request->description,
            'duration'=>$request->duration,
            'price'=>$request->price,
            'instructor'=>$request->instructor,
            'category_id'=>$request->categoryId
        ];
    }

    private function inputValidation($request,$action)
    {
        $rule = [
            'name'=>'required',
            'description'=>'required',
            'duration'=>'required',
            'price'=>'required|integer',
            'instructor'=>'required',
            'categoryId'=>'required',
        ];
        if($action == 'create') {
            $rule['image'] = 'required|mimes:jpg,png,webp';
        }else{
            $rule['image'] = 'mimes:jpg,png,webp';
        }
        Validator::make($request->all(),$rule)->validate();
    }
}
