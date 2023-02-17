<?php

namespace App\Models;

use CodeIgniter\Model;

class Photos extends Model
{
    protected $table            = 'photos';
    protected $allowedFields    = [
        'photo_id',
        'forum_id',
        'path'
    ];
}
