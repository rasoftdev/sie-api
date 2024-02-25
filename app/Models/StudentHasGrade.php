<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentHasGrade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'student_has_grades';

    protected $fillable = [
        'student_id', 'grade_id',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id');
    }
}
