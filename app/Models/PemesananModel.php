<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'quantity',
        'price',
        'customer_id',
        'color_id',
        'size_id',
        'order_date',
        'id_order'
    ];
}
