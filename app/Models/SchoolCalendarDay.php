<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolCalendarDay extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'school_calendar_days';
    protected $fillable = [
        'school_calendar_id', 'school_subjet_id', 'person_id', 'day', 'hour',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function schoolCalendar()
    {
        return $this->belongsTo(SchoolCalendar::class, 'school_calendar_id');
    }

    public function schoolSubject()
    {
        return $this->belongsTo(SchoolSubject::class, 'school_subjet_id');
    }
}
