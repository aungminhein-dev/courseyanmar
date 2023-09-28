<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'course_id',
        'media',
        'audience_type'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
