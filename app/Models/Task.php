<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'school_subjet_id', 'person_id', 'name', 'content', 'type', 'percentage', 'state',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function schoolSubject()
    {
        return $this->belongsTo(SchoolSubject::class, 'school_subjet_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
