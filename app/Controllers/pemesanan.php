<?php

namespace App\Controllers;

use App\Models\M_pembayaranModel;
use App\Models\PemesananModel;
use App\Models\SizesModel;
use App\Models\CustomerModel;
use App\Models\OrderDetailModel;
use App\Models\ProductModel;
use App\Models\ColorModel;
use App\Models\AttachmentModel;
class pemesanan extends BaseController
{

    protected $PemesananModel;
    protected $SizesModel;
    protected $CustomerModel;
    protected $OrderDetailModel;
    protected $ProductModel;
    protected $ColorModel;
    protected $AttachmentModel;
    public function __construct()
    {

        $this->PemesananModel = new PemesananModel();
        $this->SizesModel = new SizesModel();
        $this->CustomerModel = new CustomerModel();
        $this->OrderDetailModel = new OrderDetailModel();
        $this->ProductModel = new ProductModel();
        $this->ColorModel = new ColorModel();
        $this->AttachmentModel = new AttachmentModel();
    }


    public function pemesanan()
    {
        // Ambil data dari formulir
        $data = [
            'product_id' => $this->request->getPost('product_id'),
            'price' => $this->request->getPost('price'),
            'color_id' => $this->request->getPost('color_id'),
            'size_id' => $this->request->getPost('size_id'),
            'quantity' => $this->request->getPost('quantity')
        ];

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'product_id' => 'required|integer',
            'price' => 'required|decimal',
            'color_id' => 'required|integer',
            'size_id' => 'required|integer',
            'quantity' => 'required|integer|greater_than[0]|less_than_equal_to[10]'
        ]);

        if (!$validation->run($data)) {
            // Validasi gagal, kembali dengan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data pengguna yang sedang login
        $userId = session()->get('id_pelanggan'); // Anggap ID pengguna disimpan dalam sesi
        $usersModel = new \App\Models\CustomerModel();
        $user = $usersModel->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Pastikan username dan alamat ada dalam data pengguna
        if (!isset($user['username']) || !isset($user['alamat'])) {
            return redirect()->back()->with('error', 'User data is incomplete.');
        }

        // Ambil data produk berdasarkan product_id
        $productModel = new \App\Models\ProductModel();
        $productData = $productModel->find($data['product_id']);

        if (!$productData) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Ambil data size berdasarkan size_id
        $sizeModel = new \App\Models\SizesModel();
        $sizeData = $sizeModel->find($data['size_id']);

        if (!$sizeData) {
            return redirect()->back()->with('error', 'Size not found.');
        }

        // Ambil data color berdasarkan color_id
        $colorModel = new \App\Models\ColorModel();
        $colorData = $colorModel->find($data['color_id']);

        if (!$colorData) {
            return redirect()->back()->with('error', 'Color not found.');
        }

        // Tambahkan ID pengguna ke data pesanan
        $data['customer_id'] = $userId;

        // Simpan pesanan ke database
        $orderModel = new \App\Models\PemesananModel();
        $orderModel->insert($data);

        // Dapatkan ID yang baru saja dimasukkan
        $orderID = $orderModel->getInsertID();

        // Ambil data pesanan berdasarkan ID
        $orderData = $orderModel->find($orderID);

        $attachmentModel = new \App\Models\AttachmentModel();
        $filename = $attachmentModel->where('product_id', $data['product_id'])
            ->where('color_id', $data['color_id'])
            ->first('filename');

        // Pastikan data filename ada sebelum menggunakannya
        if (!$filename) {
            return redirect()->back()->with('error', 'Attachment filename not found.');
        }

        // Gabungkan data pesanan, pengguna, produk, ukuran, dan warna
        $data = [
            'order' => $orderData,
            'user' => $user,
            'product' => $productData,
            'size' => $sizeData,
            'color' => $colorData,
            'filename' => $filename
        ];

        // Tampilkan view dengan data pesanan, pengguna, produk, ukuran, dan warna
        return view('pelanggan/detailorder', $data);
    }



    public function detailorder()
    {
        return view('pelanggan/detailorder');
    }




    

    public function buatpesanan()
{
    // Ambil data dari formulir
    $data = [
        'username' => $this->request->getPost('username'),
        'alamat' => $this->request->getPost('alamat'),
        'name_product' => $this->request->getPost('name_product'),
        'id_metodePembayaran' => $this->request->getPost('id_metodePembayaran'),
        'total' => $this->request->getPost('total'),
        'id_order' => $this->request->getPost('id_order'),
    ];

    // Validasi data
    $validation = \Config\Services::validation();
    $validation->setRules([
        'username' => 'required|string|max_length[255]',
        'alamat' => 'required|string|max_length[255]',
        'name_product' => 'required|string|max_length[255]',
        'id_metodePembayaran' => 'required|integer',
        'total' => 'required|decimal',
        'id_order' => 'required|integer'
    ]);

    if (!$validation->run($data)) {
        // Validasi gagal, kembali dengan pesan error
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Ambil data pengguna yang sedang login
    $userId = session()->get('id_pelanggan'); // Anggap ID pengguna disimpan dalam sesi
    $usersModel = new CustomerModel();
    $user = $usersModel->find($userId);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    // Pastikan username dan alamat ada dalam data pengguna
    if (!isset($user['username']) || !isset($user['alamat'])) {
        return redirect()->back()->with('error', 'User data is incomplete.');
    }

    // Simpan pesanan ke database
    $orderModel = new OrderDetailModel();
    $inserted = $orderModel->insert($data);

    if ($inserted) {
        // Pesanan berhasil disimpan
        $orderID = $orderModel->getInsertID();
        $orderData = $orderModel->find($orderID);

        // Ambil data metode pembayaran berdasarkan id_metodePembayaran
        $paymentMethodModel = new M_pembayaranModel();
        $paymentMethod = $paymentMethodModel->find($orderData['id_metodePembayaran']);

        // Set session flashdata untuk pesan sukses
        session()->setFlashdata('success', 'Pesanan berhasil dibuat!');

        // Gabungkan data pesanan, pengguna, dan metode pembayaran
        $data = [
            'order' => $orderData,
            'user' => $user,
            'paymentMethod' => $paymentMethod,
        ];

        // Tampilkan view dengan data pesanan, pengguna, dan metode pembayaran
        return view('pelanggan/buatpesanan', $data);
    } else {
        // Gagal menyimpan pesanan
        session()->setFlashdata('error', 'Gagal membuat pesanan.');
        return redirect()->back()->withInput();
    }
}


   




    public function lihatpesanan($id)
    {
        // Ambil data pesanan berdasarkan ID
        $orderModel = new PemesananModel();
        $orderData = $orderModel->find($id);
    
        if (!$orderData) {
            return redirect()->back()->with('error', 'Order not found.');
        }
    
        // Ambil data produk berdasarkan product_id
        $productModel = new ProductModel();
        $productData = $productModel->find($orderData['product_id']);
    
        // Ambil data color berdasarkan color_id
        $colorModel = new ColorModel();
        $colorData = $colorModel->find($orderData['color_id']);
    
        // Ambil data customer berdasarkan customer_id
        $customerModel = new CustomerModel();
        $customerData = $customerModel->find($orderData['customer_id']);
    
        // Ambil data size berdasarkan size_id
        $sizeModel = new SizesModel();
        $sizeData = $sizeModel->find($orderData['size_id']);
    
        // Ambil data detail order berdasarkan order_id
        $orderDetailModel = new OrderDetailModel();
        $orderDetailData = $orderDetailModel->where('id_order', $id)->first();
    
        // Ambil filename dari attachment berdasarkan product_id dan color_id
        $attachmentModel = new AttachmentModel();
        $attachmentFilename = $attachmentModel->getFilenameByProductIdAndColorId($orderData['product_id'], $orderData['color_id']);
    
        // Ambil data metode pembayaran berdasarkan id_metodePembayaran dari detail order
        $paymentMethod = null;
        if ($orderDetailData) {
            $paymentMethodModel = new M_pembayaranModel();
            $paymentMethod = $paymentMethodModel->find($orderDetailData['id_metodePembayaran']);
        }
    
        // Gabungkan data untuk dikirim ke view
        $data = [
            'order' => $orderData,
            'orderDetail' => $orderDetailData,
            'product' => $productData,
            'color' => $colorData,
            'customer' => $customerData,
            'size' => $sizeData,
            'paymentMethod' => $paymentMethod,
            'filename' => $attachmentFilename, // Tambahkan filename attachment ke dalam data
        ];
    
        // Tampilkan view dengan data pesanan dan detail terkait
        return view('pelanggan/lihatpesanan', $data);
    }
    


}    
    

