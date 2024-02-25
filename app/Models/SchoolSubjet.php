<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolSubjet extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'school_subjets';
    protected $fillable = [
        'code', 'name', 'grade_id',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function schoolCalendarDays()
    {
        return $this->hasMany(SchoolCalendarDay::class);
    }
}
