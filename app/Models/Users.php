<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table            = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields    = [
        'user_id',
        'role_id',
        'name',
        'username',
        'password',
        'profile_photo'
    ];
}
