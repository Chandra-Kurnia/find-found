<?php

namespace App\Models;

use CodeIgniter\Model;

class Forums extends Model
{
    protected $table            = 'forums';
    protected $primaryKey       = 'forum_id';
    protected $allowedFields    = [
        'forum_id',
        'user_id',
        'status_id',
        'category_id',
        'title',
        'description',
        'forum_cover',
        'latitude',
        'longitude',
        'flag_active'
    ];
}