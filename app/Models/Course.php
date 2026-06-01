<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //These fields are allowed to be inserted using create() or update()
    protected $fillable = [
        'title',
        'category',
        'duration',
        'students',
        'image',
        'description',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,'course_id','id');
    }
}