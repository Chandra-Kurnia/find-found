<?php

namespace App\Models;

use CodeIgniter\Model;

class Photos extends Model
{
    protected $table            = 'photos';
    protected $primaryKey       = 'photo_id';
    protected $allowedFields    = [
        'photo_id',
        'forum_id',
        'path'
    ];
}
