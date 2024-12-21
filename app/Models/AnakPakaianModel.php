<?php

namespace App\Models;

use CodeIgniter\Model;

class AnakPakaianModel extends Model
{
    protected $table = 'anak_pakaian';
    protected $primaryKey = 'id_anak_pakaian';
    protected $allowedFields = ['id_warna','ukuran','stok'];
}