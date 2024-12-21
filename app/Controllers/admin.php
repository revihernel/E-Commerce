<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\AttachmentModel;
use App\Models\CategoriesModel;
use App\Models\SizesModel;
use App\Models\AnakPakaianModel;
use App\Models\ColorModel;

use CodeIgniter\Controller;



class admin extends BaseController
{
    protected $ProductModel;
    protected $AttachmentModel;
    protected $CategoriesModel;
    protected $SizesModel;
    protected $AnakPakaianModel;
    protected $ColorModel;


    public function __construct()
    {

        $this->ProductModel = new ProductModel();
        $this->AttachmentModel = new AttachmentModel();
        $this->CategoriesModel = new CategoriesModel();
        $this->SizesModel = new SizesModel();
        $this->AnakPakaianModel = new AnakPakaianModel();
        $this->ColorModel = new ColorModel();
    }


    public function homeAdmin()
    {
        return view('admin/homeAdmin');
    }
    public function viewtambahpakaian()
    {
        $kategori = $this->CategoriesModel->findAll();
        $warna = $this->ColorModel->findAll();
        $data = [
            'kategori' => $kategori,
            'warna' => $warna

        ];

        return view('admin/tambahpakaian', $data);
    }
    public function pakaian()
    {
        $pakaianData = $this->ProductModel->findAll();

        $data = [
            'pakaian' => $pakaianData
        ];
        return view('admin/pakaian', $data);
    }
    public function kategoripakaian()
    {
        return view('admin/kategoripakaian');
    }
    public function metodepembayaran()
    {
        return view('admin/metodepembayaran');
    }
    public function metodepengiriman()
    {
        return view('admin/metodepengiriman');
    }


    public function tambahkategori_v()
    {
        return view('admin/tambahkategori');
    }


    public function kelolagambar_v()
    {
        $pakaianData = $this->ProductModel->findAll();
        $colorData = $this->ColorModel->findAll();

        $data = [
            'products' => $pakaianData,
            'warna' => $colorData
        ];
        return view('admin/kelolagambar', $data);
    }



    public function tambahkategori()
    {
        // Tangani data yang dikirim dari form di sini
        $category = $this->request->getPost('category');

        // Validasi data jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'category' => 'required|min_length[3]|max_length[255]' // Atur aturan validasi sesuai kebutuhan Anda
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses data jika valid
        // Misalnya, simpan data ke database
        $this->CategoriesModel->save(['category' => $category]);

        // Redirect ke halaman lain setelah berhasil
        return redirect()->to(site_url('admin/kategoripakaian'))->with('success', 'Kategori pakaian berhasil ditambahkan.');
    }

    public function tambahpakaian()
{
    helper(['form']);

    // Aturan validasi
    $rules = [
        'id_pakaian' => [
            'rules' => 'is_unique[products.id_pakaian]',
            'errors' => [
                'is_unique' => 'ID pakaian sudah terdaftar!!'
            ]
        ],
        // Tambahkan aturan validasi lainnya jika diperlukan
    ];

    // Validasi
    if ($this->validate($rules)) {
        // Persiapan data pakaian
        $dataPakaian = [
            'id_pakaian' => $this->request->getVar('id_pakaian'),
            'category_id' => $this->request->getVar('category_id'),
            'name_product' => $this->request->getVar('name_product'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'diskon' => $this->request->getVar('diskon'),  // Tambahkan diskon
            'stock' => $this->request->getVar('stock')
        ];

        // Simpan data pakaian ke tabel pakaian
        $ProductModel = new ProductModel();
        $pakaianId = $ProductModel->insert($dataPakaian);

        if ($pakaianId) {
            return redirect()->to('admin/pakaian')->with('success', 'Data pakaian berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data pakaian.');
        }
    } else {
        // Jika validasi gagal, kirim pesan kesalahan ke view
        $data['validation'] = $this->validator;
        return view('admin/pakaian', $data);
    }
}



    public function kelolagambar_store()
    {
        helper(['form']);

        // Aturan validasi
        $rules = [
            'filename' => [
                'rules' => 'uploaded[filename]|max_size[filename,2048]|is_image[filename]|mime_in[filename,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih file gambar terlebih dahulu.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'is_image' => 'File yang dipilih harus berupa gambar.',
                    'mime_in' => 'File yang dipilih harus berupa gambar dengan format jpg/jpeg/png.'
                ]
            ]
        ];

        // Validasi
        if ($this->validate($rules)) {
            // Mengambil file gambar
            $fileGambar = $this->request->getFile('filename');

            // Persiapan data attachments
            $dataAttachments = [
                'product_id' => $this->request->getVar('product_id'),
                'color_id' => $this->request->getVar('color_id'),
                'filename' => $fileGambar->getName()
            ];

            // Simpan file gambar ke folder img
            if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
                $fileGambar->move('img');
                $AttachmentModel = new AttachmentModel();
                if ($AttachmentModel->insert($dataAttachments)) {
                    return redirect()->to('admin/kelolagambar_v')->with('success', 'Gambar berhasil diunggah dan data tersimpan.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data gambar.');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal mengunggah gambar.');
            }
        } else {
            // Jika validasi gagal, kirim pesan kesalahan ke view
            $data['validation'] = $this->validator;
            // Asumsikan Anda memiliki view 'admin/kelolagambar' untuk menampilkan form dengan error
            return view('admin/kelolagambar', $data);
        }
    }
}
