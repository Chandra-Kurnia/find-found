<?php

namespace App\Models;

use CodeIgniter\Model;

class Forums extends Model
{
    protected $table            = 'forums';
    protected $allowedFields    = [
        'forum_id',
        'user_id',
        'category_id',
        'title',
        'description',
        'flag_active'
    ];
}