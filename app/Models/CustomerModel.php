<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customers';
    protected $primaryKey = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'password', 'no_hp', 'alamat', 'email'];
}
