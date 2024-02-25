<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentResume extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'student_resumes';

    protected $fillable = [
        'student_id', 'person_id', 'school_subjet_id', 'hour', 'content',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function schoolSubject()
    {
        return $this->belongsTo(SchoolSubject::class, 'school_subjet_id');
    }
}
