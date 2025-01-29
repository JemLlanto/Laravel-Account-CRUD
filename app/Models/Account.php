<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticable
{
    use HasFactory,Notifiable;

    protected $fillable=['firstName', 'lastName','birthday', 'age', 'address', 'email', 'password', 'image'];
}
