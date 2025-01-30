<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // Nama tabel

    protected $fillable = [
        'username',
        'nim',
        'semester',
        'kelas',
        'password',
        'profile_picture',
        'prodi',
        'email',
        'no_hp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
