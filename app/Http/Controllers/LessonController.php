<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    //lessons
    public function lessons($courseId)
    {
        $lessons = Lesson::where('course_id',$courseId)
        ->when(request('searchKey'),function($query){
            $query->where(request('key'),'like','%'.request('searchKey').'%');
        })
        ->get();
        $firstData = Lesson::where('course_id',$courseId)->first();
        $course = Course::where('id',$courseId)->first();
        return view('admin.lesson.index',compact('lessons','course'));
    }

    // create lesson page
    public function createLessonPage($courseId)
    {
        $course = Course::where('id',$courseId)->first();
        return view('admin.lesson.create-lesson',compact('course'));
    }

    // create lessons
    public function createLesson(Request $request)
    {
        $this->validateData($request);
        $data = $this->getLessonData($request);
        if($request->hasFile('media')){
            $fileName = uniqid().$request->file('media')->getClientOriginalName();
            $request->file('media')->storeAs('public/lessons',$fileName);
            $data['media'] = $fileName;
        }
        Lesson::create($data);
        toastr()->success('A New Lesson has been added.','Action Complete');
        return back();
    }

    // delete lesson
    public function deleteLesson($id)
    {
        Lesson::where('id',$id)->delete();
        toastr()->success('A lesson has been deleted','Action Completed!');
        return back();
    }

    // validation
    private function validateData($request)
    {
        Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'audienceType' => 'required'
        ])->validate();
    }

    // request data
    private function getLessonData($request)
    {
        return [
            'course_id'=>$request->courseId,
            'title'=> $request->title,
            'description' => $request->description,
            'audience_type'=>$request->audienceType,
        ];
    }
}
