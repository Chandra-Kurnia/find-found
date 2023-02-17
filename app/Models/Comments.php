<?php

namespace App\Models;

use CodeIgniter\Model;

class Comments extends Model
{
    protected $table            = 'comments';
    protected $allowedFields    = [
        'comment_id',
        'forum_id',
        'user_id',
        'comment'
    ];
}
