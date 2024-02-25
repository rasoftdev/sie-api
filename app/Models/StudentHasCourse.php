<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentHasCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'student_has_courses';

    protected $fillable = [
        'course_id', 'student_id', 'year',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id');
    }
}
