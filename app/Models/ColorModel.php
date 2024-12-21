<?php

namespace App\Models;

use CodeIgniter\Model;

class ColorModel extends Model
{
    protected $table = 'colors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['color'];

    
}