<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolCalendar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id', 'code', 'name', 'year',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function schoolCalendarDays()
    {
        return $this->hasMany(SchoolCalendarDay::class);
    }
}
