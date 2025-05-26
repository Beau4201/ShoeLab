<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'login'; // omdat je tabel 'login' heet, niet 'logins'

    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'adress',
        'postal',
    ];

    protected $hidden = [
        'password',
    ];
}
