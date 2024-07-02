<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public const IS_STUDENT = 1;
    public const IS_ADMIN = 2;
    public const IS_TEACHER = 3;
    public static function getRoles()
    {
        return [
            self::IS_STUDENT => 'Student',
            self::IS_ADMIN => 'Admin',
            self::IS_TEACHER => 'Teacher',
        ];
    }
}
