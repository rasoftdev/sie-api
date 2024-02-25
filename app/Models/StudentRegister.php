<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentRegister extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id', 'state', 'year',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function student()
    {
        return $this->belongsTo(Person::class);
    }
}
