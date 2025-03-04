<?php

namespace App\Models;

use ClassModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationship: A teacher can have many classes
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
