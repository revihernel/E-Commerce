<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function register()
    {
        $request = service('request');

        // Validasi data pendaftaran
        $rules = [
            'email' => 'required|valid_email',
            'username' => 'required|min_length[5]',
            'password' => 'required',
            'no_hp' => 'required|min_length[10]',
            'alamat' => 'required'
            // tambahkan aturan validasi lainnya sesuai kebutuhan
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke halaman pendaftaran dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Proses data pendaftaran disini
        $userModel = new CustomerModel();
        $userModel->save([
            'email' => $request->getPost('email'),
            'username' => $request->getPost('username'),
            'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
            'no_hp' => $request->getPost('no_hp'),
            'alamat' => $request->getPost('alamat')
            // tambahkan data lainnya sesuai kebutuhan
        ]);

        // Redirect ke halaman sukses atau halaman lainnya setelah pendaftaran berhasil
        return redirect()->to('/login');
    }


    public function login()
    {
        $request = service('request');

        // Validasi data login
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Cek apakah user ada dalam database
        $userModel = new CustomerModel();
        $user = $userModel->where('username', $request->getPost('username'))->first();

        if (!$user || !password_verify($request->getPost('password'), $user['password'])) {
            // Jika user tidak ditemukan atau password tidak sesuai, kembali ke halaman login dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }

        // Jika login berhasil, set session user dan redirect ke halaman dashboard atau halaman lainnya
        session()->set('id_pelanggan', $user['id_pelanggan']);
        // Sesuaikan dengan kebutuhan aplikasi Anda
        return redirect()->to('');
    }

    public function logout()
    {
        session()->destroy();
        
        return redirect()->to('/login');
    }
}
