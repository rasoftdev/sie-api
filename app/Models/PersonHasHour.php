<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PersonHasHour extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'person_has_hours';

    protected $fillable = [
        'person_id', 'max_hour',
    ];

    protected $dates = ['deleted_at'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
