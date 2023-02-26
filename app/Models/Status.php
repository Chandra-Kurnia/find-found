<?php

namespace App\Models;

use CodeIgniter\Model;

class Status extends Model
{
    protected $table            = 'status';
    protected $primaryKey       = 'status_id';
    protected $allowedFields    = [
        'status_id',
        'status_name',
    ];
}
