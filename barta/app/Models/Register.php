<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Register extends User
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];
}
