<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Enrollment;
use App\Models\Comment;


class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'instructor',
        'rating',
        'image',
        'buyer_count',
        'view_count',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,'id', 'course_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
