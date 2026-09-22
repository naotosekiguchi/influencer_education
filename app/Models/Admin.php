<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {
    use HasFactory;

    protected $fillable = [
        'name',
        'kana',
        'email',
        'password',
    ];

    public static function createAdmin(array $admin_data) {
        return self::create($admin_data);
    }
}
