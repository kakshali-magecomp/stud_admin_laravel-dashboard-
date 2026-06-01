<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'phone'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
     protected $table = 'registration'; 
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function enrollments()
    {
        //This defines a one-to-many relationship. A user can have many enrollments.
        return $this->hasMany(Enrollment::class);
    }
    public function courses()
    {
        //This is a many-to-many relationship. A user can enroll in many courses, and a course can have many users enrolled.
        return $this->belongsToMany(Course::class, 'enrollments', 'user_id', 'course_id');
    }
}
