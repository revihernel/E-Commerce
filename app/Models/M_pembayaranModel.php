<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pembayaranModel extends Model
{
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'via_pembayaran',
        'nomor'
    ];
}
