<?php

namespace App\Models;

use CodeIgniter\Model;

class detailpakaian extends Model
{
    protected $table = 'pakaian';
    protected $primaryKey = 'id_pakaian';
    protected $allowedFields = [
        'id_pakaian',
        'id_kategori', 
        'gambar', 
        'id_jenis_pakaian', 
        'nama_pakaian', 
        'deskripsi', 
        'bahan', 
        'harga', 
        'jumlah'
    ];
}
