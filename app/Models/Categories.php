<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $table            = 'categories';
    protected $primaryKey = 'category_id';
    protected $allowedFields    = [
        'category_id',
        'category_name',
        'description',
        'photo'
    ];
}
