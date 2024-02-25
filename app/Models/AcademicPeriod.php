<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicPeriod extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'academic_periods';
    protected $fillable = [
        'code', 'name',
    ];

    protected $dates = ['deleted_at'];
}
