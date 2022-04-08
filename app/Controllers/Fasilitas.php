<?php

namespace App\Controllers;

class Fasilitas extends BaseController
{
    protected $fasilitasModel;
    public function __construct()
    {
        //load model
        $this->fasilitasModel = new \App\Models\FasilitasModel();
    }
    // public function user()
    // {
    //     $data['kamar'] = $this->fasilitasModel->findAll();
    //     return view('user', $data);
    // }

    public function index()
    {
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['fasilitas'] = $this->fasilitasModel->findAll();
        //Menampilkan hasil ke view
        return view('tampil_fasilitas', $data);
    }

    public function fs()
    {
        // memasukan semua data dalam array
        // $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['fasilitas'] = $this->fasilitasModel->findAll();
        //Menampilkan hasil ke view
        return view('index', $data);
    }


    public function create()
    {
        $data['judul'] = 'Add fasilitas';
        return view('tambah_fasilitas', $data);
    }
    public function save()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'id_fasilitas' => $this->request->getPost('id_fasilitas'),
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'detail_fasilitas' => $this->request->getPost('detail_fasilitas'),
            'hotel_fasilitas' => $this->request->getPost('hotel_fasilitas'),
            'logo' => $this->request->getPost('logo'),
        ];
        //panggil function insert di model
        $this->fasilitasModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/fasilitas');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        //ambil data berdasarkan id yang dikirm
        // gunakan fungsi Where()->findAll()
        $data['fasilitas'] = $this->fasilitasModel->where('id_fasilitas', $id)->findAll();;
        //tampilkan data di view
        return view('edit_fasilitas', $data);
    }
    public function update()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'id_fasilitas' => $this->request->getPost('id_fasilitas'),
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'detail_fasilitas' => $this->request->getPost('detail_fasilitas'),
            'hotel_fasilitas' => $this->request->getPost('hotel_fasilitas'),
            'logo' => $this->request->getPost('logo'),
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        $this->fasilitasModel->update(['id_fasilitas' => $this->request->getPost('id_fasilitas')], $data);
        //kembali ke table fasilitas
        return redirect()->to('/fasilitas');
    }
    public function destroy($id)
    {
        // hapus data berdasarkan id
        $this->fasilitasModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/fasilitas');
    }
}
