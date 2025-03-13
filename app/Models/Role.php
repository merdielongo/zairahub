<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    const ADMIN = 'admin';
    const USER = 'user';
    const ROOT = 'root';
    const OWNER = 'owner';
    const MEMBER = 'member';
    const INSTRUCTOR = 'instructor';
    const STUDENT = 'student';
    const AUTHOR = 'author';
    const GUEST = 'guest';
}
