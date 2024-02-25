<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualifications extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'qualifications';
    protected $fillable = [
        'task_id', 'student_id', 'delivery_date', 'value', 'academic_period_id',
    ];

    protected $dates = ['delivery_date', 'created_at', 'updated_at', 'deleted_at'];

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function academicPeriod()
    {
        return $this->belongsTo(AcademicPeriod::class);
    }
}
