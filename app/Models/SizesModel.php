<?php

namespace App\Models;

use CodeIgniter\Model;

class SizesModel extends Model
{
    protected $table = 'sizes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['size'];

    
}