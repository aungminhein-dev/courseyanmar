<?php

namespace App\Models;
use App\Models\User;
use App\Models\Course;
use App\Models\DenyReason;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','course_id','status','payment_screenshot','order_status'
    ];

    public function denyReason()
    {
        return $this->hasMany(DenyReason::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
