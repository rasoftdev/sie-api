<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'persons';

    protected $fillable = [
        'user_id', 'document_type', 'document_number', 'document_issuance', 'document_issue_date', 'first_name', 'last_ name', 'birthday', 'rh', 'gender', 'main_phone', 'other_phone', 'stratum', 'sisben', 'eps', 'occupation', 'state',
    ];

    protected $dates = ['birthday', 'document_issue_date', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function personHasHours()
    {
        return $this->hasOne(PersonHasHours::class);
    }

    public function personHasNotifications()
    {
        return $this->hasMany(PersonHasNotification::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
