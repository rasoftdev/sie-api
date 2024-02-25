<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'curriculums';
    protected $fillable = [
        'grade_id', 'name', 'code', 'year',
    ];

    protected $dates = ['deleted_at'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
