<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\AttachmentModel;
use App\Models\CustomerModel;
use App\Models\CategoriesModel;
class pages extends BaseController
{

    protected $ProductModel;
    protected $AttachmentModel;
    protected $CategoriesModel;
    protected $CustomerModel;

    public function __construct()
    {

        $this->ProductModel = new ProductModel();
        $this->AttachmentModel = new AttachmentModel();
        $this->CustomerModel = new CustomerModel();
        $this->CategoriesModel = new CategoriesModel();
    }

    // public function index()
    // {
    //     $CustomerModel = new CustomerModel();
    //     $pakaianData = $this->ProductModel->findAll();
    //     $CategoriesModel = new CategoriesModel();
    //     // Tambahkan filename ke setiap produk
    //     foreach ($pakaianData as &$product) {
    //         $attachment = $this->AttachmentModel->getFirstFilenameByProductId($product['id']);
    //         $product['filename'] = $attachment ? $attachment['filename'] : null;
    //     }
    //     $categories = $CategoriesModel->findAll();


    //     $data = [
    //         'products' => $pakaianData,
    //         'categories' => $categories
    //     ];
    //     $data['id_pelanggan'] = $CustomerModel->findAll();

    //     return view('pages/beranda', $data);
    // }

    public function index()
{
    // Mendapatkan data produk dari ProductModel
    $pakaianData = $this->ProductModel->findAll();

    // Membuat objek CategoriesModel untuk mendapatkan kategori
    $CategoriesModel = new CategoriesModel();
    $categories = $CategoriesModel->findAll();

    // Mendapatkan data pelanggan jika sudah login
    $CustomerModel = new CustomerModel();
    $id_pelanggan = session()->get('id_pelanggan'); // Sesuaikan dengan cara Anda untuk mendapatkan id_pelanggan
    $pelanggan = $CustomerModel->find($id_pelanggan); // Mendapatkan data pelanggan berdasarkan id_pelanggan

    // Tambahkan filename ke setiap produk
    foreach ($pakaianData as &$product) {
        $attachment = $this->AttachmentModel->getFirstFilenameByProductId($product['id']);
        $product['filename'] = $attachment ? $attachment['filename'] : null;
    }

    // Data yang akan dikirimkan ke view
    $data = [
        'products' => $pakaianData,
        'categories' => $categories,
        'id_pelanggan' => $id_pelanggan,
       
    ];

    // Memanggil view 'pages/beranda' dan mengirimkan data
    return view('pages/beranda', $data);
}


    public function login()
    {
        return view('pages/login');
    }
    public function register()
    {
        return view('pages/register');
    }
}
