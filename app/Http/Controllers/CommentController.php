<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $data = [
            'course_id' => $request->courseId,
            'user_id' => Auth::user()->id,
            'description' => $request->description
        ];
        Comment::create($data);
        toastr()->success('Commented','Action Completed!');
        return back();
    }
}
