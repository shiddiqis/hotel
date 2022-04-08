<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth   extends BaseController
{
    protected $AuthModel;
    public function __construct()
    {
        // load model admin
        $this->AuthModel = new \App\Models\AuthModel();
    }
    //VARIABLE JUDUL UNTUK VIEW => REGISTER
    public function index()
    {
        //tampilkan laman register
        return view('index');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register()
    {
        //untuk validasi
        $validasi = $this->validate([
            'email' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'email harus diisi',
                    'min_length' => 'email minimal 5 karakter'
                ]
            ],
            'password_new' => [
                //password harus diisi dan minimal 8 karakter
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'password' => [
                //password keduanya harus sama
                'rules' => 'matches[password_new]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ],
            'username' => [
                //jika username sudah ada di table dan harus diisi
                'rules' => 'required|is_unique[tb_user.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'NIK' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'min_length' => 'NIK minimal 5 karakter'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'gender harus dipilih'
                ]
            ],
        ]);
        //jika data tidak sesuai kembali dan munculkan pesan error di form register.
        if (!$validasi) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        //Jika data sesuai lakukan penyimpanan data
        $data = [
            'email' => $this->request->getPost('email'),
            //enkripsi password dengan BCRYPT
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'username' => $this->request->getPost('username'),
            'NIK' => $this->request->getPost('NIK'),
            'gender' => $this->request->getPost('gender'),
            'akses' => 'user',
        ];
        //memasukan data dalam database
        $this->AuthModel->insert($data);
        //jika berhasil arahkan ke tampilan login
        return redirect()->to('/login');
    }
    public function login()
    {
        $data['judul'] = 'Login Admin';
        //tampilkan laman login
        return view('login', $data);
    }
    public function cek_login()
    {
        //ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        //cari data dari tabel admin sesuai username
        $dataUser = $this->AuthModel->where('username', $username)->first();
        // jika ada
        if ($dataUser) {
            //jika password sesuai
            if (password_verify($password, $dataUser['password'])) {
                //masukan session untuk username dan status login
                session()->set([
                    'id'      => $dataUser['id_user'],
                    'akses'      => $dataUser['akses'],
                    'username' => $username,
                    'logged_in' => true
                ]);
                //masukan ke laman crud employe
                return redirect()->to('/user');
            }
        } else { //jika salah
            //kembali ke login dan berikan pesan error
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
    public function logout()
    {
        //hapus session
        session()->destroy();
        return redirect()->to('/login');
    }
}
