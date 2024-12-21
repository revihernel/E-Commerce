<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ColorModel;
use App\Models\CategoriesModel;
use App\Models\AttachmentModel;
use App\Models\PemesananModel;
use App\Models\SizesModel;
use App\Models\CustomerModel;
use App\Models\OrderDetailModel;
use App\Models\M_pembayaranModel;



class pelanggan extends BaseController
{
    protected $ProductModel;
    protected $AttachmentModel;
    protected $SizesModel;
    protected $CategoriesModel;
    protected $CustomerModel;
    protected $PemesananModel;
    protected $ColorModel;
    protected $OrderDetailModel;
    protected $M_pembayaranModel;
    public function __construct()
    {

        $this->ProductModel = new ProductModel();
        $this->AttachmentModel = new AttachmentModel();
        $this->SizesModel = new SizesModel();
        $this->CustomerModel = new CustomerModel();
        $this->CategoriesModel = new CategoriesModel();
        $this->PemesananModel = new PemesananModel();
        $this->ColorModel = new ColorModel();
        $this->OrderDetailModel = new OrderDetailModel();
        $this->M_pembayaranModel = new M_pembayaranModel();
    }

    public function detailpakaian($id)
    {
        $ProductModel = new ProductModel();
        $CategoriesModel = new CategoriesModel();
        $SizesModel = new SizesModel();

        $productData = $ProductModel->getProductWithAttachmentsById($id);

        if (!$productData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan: ' . $id);
        }

        // Data produk utama
        $data['product'] = $productData[0];

        // Semua lampiran gambar
        $data['attachments'] = array_filter($productData, function ($item) {
            return !empty($item['filename']);
        });

        // Semua ukuran
        $data['sizes'] = $SizesModel->findAll();

        // Semua kategori untuk navigasi
        $data['categories'] = $CategoriesModel->findAll();

        return view('pelanggan/detailpakaian', $data);
    }



    public function jenisPakaian($categoryId)
    {
        $ProductModel = new ProductModel();
        $CategoriesModel = new CategoriesModel();
        $AttachmentModel = new AttachmentModel();

        // Mengambil data produk berdasarkan category_id
        $productData = $ProductModel->where('category_id', $categoryId)->findAll();

        // Mengambil data kategori berdasarkan category_id
        $category = $CategoriesModel->where('category_id', $categoryId)->first();


        // Tambahkan filename ke setiap produk
        foreach ($productData as &$product) {
            $attachment = $AttachmentModel->getFirstFilenameByProductId($product['id']);
            $product['filename'] = $attachment ? $attachment['filename'] : null;
        }

        // Mengambil semua kategori untuk menampilkan dalam navigasi
        $categories = $CategoriesModel->findAll();

        $data = [
            'products' => $productData,
            'categories' => $categories,
            'category' => $category
        ];

        return view('pelanggan/jenisPakaian', $data);
    }
    // public function homePelanggan()
    // {
    //     // Mendapatkan data produk dari ProductModel
    //     $pakaianData = $this->ProductModel->findAll();

    //     // Membuat objek CategoriesModel untuk mendapatkan kategori
    //     $CategoriesModel = new CategoriesModel();
    //     $categories = $CategoriesModel->findAll();

    //     // Mendapatkan data pelanggan jika sudah login
    //     $CustomerModel = new CustomerModel();
    //     $id_pelanggan = session()->get('id_pelanggan'); // Sesuaikan dengan cara Anda untuk mendapatkan id_pelanggan
    //     $pelanggan = $CustomerModel->find($id_pelanggan); // Mendapatkan data pelanggan berdasarkan id_pelanggan

    //     // Tambahkan filename ke setiap produk
    //     foreach ($pakaianData as &$product) {
    //         $attachment = $this->AttachmentModel->getFirstFilenameByProductId($product['id']);
    //         $product['filename'] = $attachment ? $attachment['filename'] : null;
    //     }

    //     // Data yang akan dikirimkan ke view
    //     $data = [
    //         'products' => $pakaianData,
    //         'categories' => $categories,
    //         'id_pelanggan' => $id_pelanggan,
    //         'username' => $pelanggan ? $pelanggan['username'] : null // Mengambil username jika pelanggan ada
    //     ];

    //     // Memanggil view 'pages/beranda' dan mengirimkan data
    //     return view('pages/beranda', $data);
    // }


    
}
