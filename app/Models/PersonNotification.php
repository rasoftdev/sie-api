<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id', 'notification_id',
    ];

    protected $dates = ['deleted_at'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
}
