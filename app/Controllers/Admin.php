<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        //load model
        $this->adminModel = new \App\Models\AdminModel();
    }
    public function index()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['admin'] = $this->adminModel->findAll();
        //Menampilkan hasil ke view
        return view('tampil_data', $data);
    }
    public function create()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        $data['judul'] = 'Add User';
        return view('tambah_data', $data);
    }
    public function save()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        //ambil data dari form dan masukan ke array
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'username' => $this->request->getPost('username'),
            'NIK' => $this->request->getPost('NIK'),
            'gender' => $this->request->getPost('gender'),
            'akses' => $this->request->getPost('akses')
        ];
        //panggil function insert di model
        $this->adminModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/admin');
    }

    public function edit($id)
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        $data['judul'] = 'Edit User';
        //ambil data berdasarkan id yang dikirm
        // gunakan fungsi Where()->findAll()
        $data['admin'] = $this->adminModel->where('id_user', $id)->findAll();;
        //tampilkan data di view
        return view('edit_data', $data);
    }
    public function update()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        //ambil data dari form dan masukan ke array
        $data = [
            'akses' => $this->request->getPost('akses')
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        $this->adminModel->update(['id_user' => $this->request->getPost('id_user')], $data);
        //kembali ke table admin
        return redirect()->to('/admin');
    }
    public function destroy($id)
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        // hapus data berdasarkan id
        $this->adminModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/admin');
    }
}
