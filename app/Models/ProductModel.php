<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_pakaian',
        'name_product',
        'description',
        'price',
        'category_id',
        'stock',
        'diskon'
    ];

    // public function getProductsWithAttachments()
    // {
    //     return $this->select('products.*, attachments.filename, attachments.color_id, colors.color')
    //         ->join('attachments', 'attachments.product_id = products.id', 'left')
    //         ->join('colors', 'colors.id = attachments.color_id', 'left')
    //         ->findAll();
    // }



    public function getProductWithAttachmentsById($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('products.*, attachments.filename, attachments.color_id');
        $builder->join('attachments', 'attachments.product_id = products.id', 'left');
        $builder->where('products.id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
