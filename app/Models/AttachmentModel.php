<?php

namespace App\Models;

use CodeIgniter\Model;

class AttachmentModel extends Model
{
    protected $table = 'attachments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'color_id', 'filename'];

    public function getFirstFilenameByProductId($productId)
    {
        return $this->where('product_id', $productId)->first();
    }

    public function getFilenameByProductIdAndColorId($productId, $colorId)
    {
        return $this->where('product_id', $productId)
            ->where('color_id', $colorId)
            ->first('filename');
    }
}
