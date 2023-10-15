<?php

namespace App\Models;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenyReason extends Model
{
    use HasFactory;
    protected $fillable = ['description','enrollment_id','admin_name'];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

}
