<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username',
        'alamat',
        'name_product',
        'price',
        'total',
        'id_metodePembayaran',
        'tanggal_pemesanan',
        'id_order'
    ];
}
