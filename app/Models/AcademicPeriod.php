<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicPeriod extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'academic_periods';
    protected $fillable = [
        'code', 'name',
    ];

    protected $dates = ['deleted_at'];
}
