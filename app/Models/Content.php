<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contents';
    protected $fillable = [
        'curriculum_id', 'academic_period_id', 'content',
    ];

    protected $dates = ['deleted_at'];

    public function academicPeriod()
    {
        return $this->belongsTo(AcademicPeriod::class);
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
