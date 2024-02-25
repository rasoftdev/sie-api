<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assistence extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'assistences';
    protected $fillable = [
        'student_id', 'person_id', 'school_subject_id', 'academic_period_id',
        'hour', 'date', 'in_class', 'justified_absence',
    ];

    protected $dates = ['deleted_at'];

    public function academicPeriod()
    {
        return $this->belongsTo(AcademicPeriod::class);
    }

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function schoolSubject()
    {
        return $this->belongsTo(SchoolSubject::class);
    }
}
