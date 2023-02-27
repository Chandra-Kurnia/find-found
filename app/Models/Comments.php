<?php

namespace App\Models;

use CodeIgniter\Model;

class Comments extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'comment_id';
    protected $allowedFields    = [
        'comment_id',
        'forum_id',
        'user_id',
        'comment'
    ];
}
