<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //These fields are allowed to be inserted using create() or update()
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);//Each enrollment belongs to one user
    }

    public function course()
    {
        return $this->belongsTo(Course::class);//Each enrollment belongs to one course
    }
}