<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentHasParent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'student_has_parents';

    protected $fillable = [
        'student_id', 'parent_id', 'kinship', 'is_attendant',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id');
    }

    public function parent()
    {
        return $this->belongsTo(Person::class, 'parent_id');
    }
}
