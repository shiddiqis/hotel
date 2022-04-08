<?php

namespace App\Controllers;

class  Pesan extends BaseController
{
    protected $kamarModel;
    protected $reservasiModel;
    public function __construct()
    {
        //load model
        $this->kamarModel = new \App\Models\KamarModel();
        $this->reservasiModel = new \App\Models\ReservasiModel();
    }
    public function user()
    {
        $data['kamar'] = $this->kamarModel->findAll();
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

    public function create()
    {
        $data['judul'] = 'Add Kamar';
        return view('tambah_kamar', $data);
    }
    public function save()
    {
        //ambil data dari form dan masukan ke array
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getName();
        $gambar->move('assets/img/kamar');
        $data = [
            'id_kamar' => $this->request->getPost('id_kamar'),
            'nama_kamar' => $this->request->getPost('nama_kamar'),
            'tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'fasilitas' => $this->request->getPost('fasilitas'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status'),
            'gambar' => $namaGambar,
        ];
        //panggil function insert di model
        $this->kamarModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/kamar');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        //ambil data berdasarkan id yang dikirm
        // gunakan fungsi Where()->findAll()
        $data['kamar'] = $this->kamarModel->where('id_kamar', $id)->findAll();;
        //tampilkan data di view
        return view('edit_kamar', $data);
    }
    public function update()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'id_fasilitas' => $this->request->getPost('id_fasilitas'),
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'harga' => $this->request->getPost('harga')
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        $this->kamarModel->update(['id_fasilitas' => $this->request->getPost('id_kamar')], $data);
        //kembali ke table kamar
        return redirect()->to('/pesan');
    }
    public function destroy($id)
    {
        // hapus data berdasarkan id
        $this->kamarModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/pesan');
    }

    // TAMPIL PEMESANAN
    public function pemesanan($id)
    {
        $data['kamar'] = $this->kamarModel->where('id_kamar', $id)->findAll();
        return view('pemesanan', $data);
    }

    public function pesanKamar()
    {
        $data = [
            'id_reservasi'  => $this->request->getPost('id_reservasi'),
            'id_user'  => $this->request->getPost('id_user'),
            'id_kamar'  => $this->request->getPost('id_kamar'),
            'checkin'  => $this->request->getPost('checkin'),
            'checkout'  => $this->request->getPost('checkout'),
            'pembayaran'  => $this->request->getPost('pembayaran'),
            'status'  => 'dipesan'
        ];
        $this->reservasiModel->insert($data);
        return redirect()->back();
    }
}
