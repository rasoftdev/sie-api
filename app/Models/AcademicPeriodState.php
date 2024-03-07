<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicPeriodState extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'academic_period_has_states';
    protected $fillable = [
        'academic_period_id', 'state', 'year',
    ];

    protected $dates = ['deleted_at'];

    public function academicPeriod()
    {
        return $this->belongsTo(AcademicPeriod::class);
    }
}
