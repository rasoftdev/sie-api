<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkingDay extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'person_id', 'workday', 'year',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
