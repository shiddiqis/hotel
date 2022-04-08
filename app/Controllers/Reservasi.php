<?php

namespace App\Controllers;

class Reservasi extends BaseController
{
    protected $reservasiModel, $fasilitasModel;
    public function __construct()
    {
        //load model
        $this->reservasiModel = new \App\Models\ReservasiModel();
        // $this->fasilitasModel = new \App\Models\FasilitasModel();
    }
    public function user()
    {
        $data['reservasi'] = $this->reservasiModel->findAll();
        $data['fasilitas'] = $this->reservasiModel->joinOke();
        return view('user', $data);
    }
    public function index()
    {
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['reservasi'] = $this->reservasiModel->joinOke();
        //Menampilkan hasil ke view
        return view('tampil_reservasi', $data);
    }
    public function filterReservasi()
    {
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        if ($this->request->getGet('checkin') == '' && $this->request->getGet('checkout') == '') {
            $data['reservasi'] = $this->reservasiModel->joinOke();
        } else {
            $checkin = $this->request->getGet('checkin') . " 00:00:00";
            $checkout = $this->request->getGet('checkout') . " 00:00:00";
            $data['reservasi'] = $this->reservasiModel->filterjoinOke($checkin, $checkout);
        }
        //Menampilkan hasil ke view
        return view('tampil_reservasi', $data);
    }

    public function reservasi()
    {
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['reservasi'] = $this->reservasiModel->findAll();
        //Menampilkan hasil ke view
        return view('tampil_reservasi', $data);
    }

    public function create()
    {
        $data['judul'] = 'Add reservasi';
        return view('tambah_reservasi', $data);
    }
    public function save()
    {
        //ambil data dari form dan masukan ke array
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getName();
        $gambar->move('assets/img/kamar');
        $data = [
            'id_reservasi' => $this->request->getPost('id_reservasi'),
            'nama_reservasi' => $this->request->getPost('nama_reservasi'),
            'tipe_reservasi' => $this->request->getPost('tipe_reservasi'),
            'fasilitas' => $this->request->getPost('fasilitas'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status'),
            'gambar' => $namaGambar,
        ];
        //panggil function insert di model
        $this->reservasiModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/reservasi');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        //ambil data berdasarkan id yang dikirm
        // gunakan fungsi Where()->findAll()
        $data['reservasi'] = $this->reservasiModel->where('id_reservasi', $id)->findAll();
        //tampilkan data di view
        return view('edit_reservasi', $data);
    }
    public function update()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'statusr' => $this->request->getPost('statusr')
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        $this->reservasiModel->update(['id_reservasi' => $this->request->getPost('id_reservasi')], $data);
        //kembali ke table reservasi
        return redirect()->to('/reservasi');
    }
    public function destroy($id)
    {
        // hapus data berdasarkan id
        $this->reservasiModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/reservasi');
    }
}
