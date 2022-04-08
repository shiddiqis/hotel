<?php

namespace App\Controllers;

class Kamar extends BaseController
{
    protected $kamarModel, $fasilitasModel;
    public function __construct()
    {
        //load model
        $this->kamarModel = new \App\Models\KamarModel();
        $this->fasilitasModel = new \App\Models\FasilitasModel();
    }
    public function user()
    {
        $data['kamar'] = $this->kamarModel->findAll();
        $data['fasilitas'] = $this->kamarModel->joinOke();
        return view('user', $data);
    }
    public function index()
    {
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['kamar'] = $this->kamarModel->findAll();
        //Menampilkan hasil ke view
        return view('index', $data);
    }

    public function kamar()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['kamar'] = $this->kamarModel->findAll();
        //Menampilkan hasil ke view
        return view('tampil_kamar', $data);
    }

    public function create()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        $data['judul'] = 'Add Kamar';
        return view('tambah_kamar', $data);
    }
    public function save()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        //ambil data dari form dan masukan ke array
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getName();
        $gambar->move('assets/img/kamar');
        $data = [
            'id_kamar' => $this->request->getPost('id_kamar'),
            'nama_kamar' => $this->request->getPost('nama_kamar'),
            'tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'fasilitas' => $this->request->getPost('fasilitas'),
            'status' => $this->request->getPost('status'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $namaGambar,
        ];
        //panggil function insert di model
        $this->kamarModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/kamar');
    }

    public function edit($id)
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        $data['judul'] = 'Edit User';
        //ambil data berdasarkan id yang dikirm
        // gunakan fungsi Where()->findAll()
        $data['kamar'] = $this->kamarModel->where('id_kamar', $id)->findAll();;
        //tampilkan data di view
        return view('edit_kamar', $data);
    }
    public function update()
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        //ambil data dari form dan masukan ke array
        $data = [
            'id_kamar' => $this->request->getPost('id_kamar'),
            'nama_kamar' => $this->request->getPost('nama_kamar'),
            'tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'fasilitas' => $this->request->getPost('fasilitas'),
            'status' => $this->request->getPost('status'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $this->request->getPost('gambar'),
            'akses' => $this->request->getPost('akses')
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        $this->kamarModel->update(['id_kamar' => $this->request->getPost('id_kamar')], $data);
        //kembali ke table kamar
        return redirect()->to('/kamar');
    }
    public function destroy($id)
    {
        if (session()->get('akses') != 'admin') {
            return redirect()->to('/user');
        }
        // hapus data berdasarkan id
        $this->kamarModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/kamar');
    }
}
