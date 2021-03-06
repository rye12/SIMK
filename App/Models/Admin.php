<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $table = 'admin';

    protected $fillable = [
        'name', 'email', 'username', 'password','email_verfied_at'
    ];

    protected $hidden = ['password'];
}